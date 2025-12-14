<?php
/**
 * functions.php - Utility functions for the website
 */

// Suppress errors for production (can be removed for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

/**
 * Create a thumbnail from an image
 * 
 * @param string $sourceImagePath Path to the original image
 * @param string $thumbPath Path where thumbnail will be saved
 * @param int $thumbWidth Width of thumbnail (default: 300)
 * @param int $thumbHeight Height of thumbnail (default: 300)
 * @return bool True on success, false on failure
 */
function createThumbnail($sourceImagePath, $thumbPath, $thumbWidth = 300, $thumbHeight = 300) {
    // Check if source file exists
    if (!file_exists($sourceImagePath)) {
        error_log("Source image not found: " . $sourceImagePath);
        return false;
    }
    
    // Get the original image dimensions and type
    $imageInfo = @getimagesize($sourceImagePath);
    if (!$imageInfo) {
        error_log("Unable to get image size: " . $sourceImagePath);
        return false;
    }
    
    list($originalWidth, $originalHeight, $imageType) = $imageInfo;

    // Create image resource based on type
    try {
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($sourceImagePath);
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($sourceImagePath);
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($sourceImagePath);
                break;
            case IMAGETYPE_WEBP:
                $sourceImage = imagecreatefromwebp($sourceImagePath);
                break;
            default:
                error_log("Unsupported image format: " . $imageType);
                return false;
        }
    } catch (Exception $e) {
        error_log("Error creating image resource: " . $e->getMessage());
        return false;
    }

    // Create a blank thumbnail with white background
    $thumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
    
    // Preserve transparency for PNG and GIF
    if ($imageType == IMAGETYPE_PNG || $imageType == IMAGETYPE_GIF) {
        imagealphablending($thumbImage, false);
        imagesavealpha($thumbImage, true);
        $transparent = imagecolorallocatealpha($thumbImage, 255, 255, 255, 127);
        imagefilledrectangle($thumbImage, 0, 0, $thumbWidth, $thumbHeight, $transparent);
    } else {
        $white = imagecolorallocate($thumbImage, 255, 255, 255);
        imagefill($thumbImage, 0, 0, $white);
    }

    // Calculate aspect ratio and new dimensions
    $aspectRatio = $originalWidth / $originalHeight;
    
    if ($aspectRatio > 1) {
        // Landscape orientation
        $newWidth = $thumbWidth;
        $newHeight = $thumbWidth / $aspectRatio;
        $x = 0;
        $y = ($thumbHeight - $newHeight) / 2;
    } else {
        // Portrait or square orientation
        $newHeight = $thumbHeight;
        $newWidth = $thumbHeight * $aspectRatio;
        $x = ($thumbWidth - $newWidth) / 2;
        $y = 0;
    }

    // Resize and center the image
    imagecopyresampled(
        $thumbImage, $sourceImage, 
        (int)$x, (int)$y, 0, 0, 
        (int)$newWidth, (int)$newHeight, 
        $originalWidth, $originalHeight
    );

    // Ensure directory exists
    $thumbDir = dirname($thumbPath);
    if (!is_dir($thumbDir)) {
        mkdir($thumbDir, 0755, true);
    }

    // Save the thumbnail
    $success = false;
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $success = imagejpeg($thumbImage, $thumbPath, 90);
            break;
        case IMAGETYPE_PNG:
            $success = imagepng($thumbImage, $thumbPath, 8);
            break;
        case IMAGETYPE_GIF:
            $success = imagegif($thumbImage, $thumbPath);
            break;
        case IMAGETYPE_WEBP:
            $success = imagewebp($thumbImage, $thumbPath, 90);
            break;
    }

    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($thumbImage);

    return $success;
}

/**
 * Sanitize HTML output
 * 
 * @param string $text Text to sanitize
 * @return string Sanitized text
 */
function sanitizeOutput($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Get excerpt from text
 * 
 * @param string $text Full text
 * @param int $length Maximum length
 * @return string Excerpt
 */
function getExcerpt($text, $length = 150) {
    $text = strip_tags($text);
    if (strlen($text) <= $length) {
        return $text;
    }
    
    $text = substr($text, 0, $length);
    $lastSpace = strrpos($text, ' ');
    
    if ($lastSpace !== false) {
        $text = substr($text, 0, $lastSpace);
    }
    
    return $text . '...';
}

/**
 * Format phone number for display
 * 
 * @param string $phone Phone number
 * @return string Formatted phone number
 */
function formatPhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) == 10) {
        return preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $phone);
    }
    return $phone;
}
?>