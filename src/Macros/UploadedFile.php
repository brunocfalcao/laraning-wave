<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

// Sets the image initial attributes.
UploadedFile::macro('set', function () {
    if (!isset($this->image)) {
        $this->reload();
    }

    if (!isset($this->filename)) {
        $this->filename = $this->hashName();
        $this->basename = collect(explode('.', $this->filename))->first();
        $this->extension = collect(explode('.', $this->filename))->last();
    }
});

// Reload image to its original dimension attributes.
UploadedFile::macro('reload', function () {
    $this->image = Image::make($this->path());
    $this->dimensions = getimagesize($this->path());
    $this->targetWidth = $this->dimensions[0];
    $this->targetHeight = $this->dimensions[1];
    $this->applyResize = false;
    $this->retina = false;

    return $this;
});

// Prepares image to be resized.
UploadedFile::macro('resize', function ($width = null, $height = null) {
    $this->set();

    if (!is_null($width)) {
        $this->targetWidth = $width;
    }

    if (!is_null($height)) {
        $this->targetWidth = $height;
    }

    $this->applyResize = true;

    return $this;
});

// Resizes image in half.
UploadedFile::macro('resizeHalf', function () {
    $this->set();

    $this->targetWidth = round($this->dimensions[0] / 2);
    $this->targetHeight = round($this->dimensions[1] / 2);
    $this->applyResize = true;

    return $this;
});

// Resizes image in a quarter.
UploadedFile::macro('resizeQuarter', function () {
    $this->set();

    $this->targetWidth = round($this->dimensions[0] / 4);
    $this->targetHeight = round($this->dimensions[1] / 4);
    $this->applyResize = true;

    return $this;
});

// Indicates to create the retina image ( + half of image) automatically.
UploadedFile::macro('retina', function () {
    $this->set();

    $this->retina = true;

    return $this;
});

// Save image using the attributes.
UploadedFile::macro('save', function ($suffix, $path) {
    $this->set();

    // Compute suffix.
    if ($suffix != null) {
        $suffix = '_'.$suffix;
    }

    // Compute target path.
    $targetPath = "{$path}/{$this->basename}/";
    File::makeDirectory($targetPath, 0777, true, true);

    // Resize image resize?
    if ($this->applyResize) {
        $this->image->resize($this->targetWidth, $this->targetHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }

    // Retina? -- Save current image with @2x, and half without @2x.
    if ($this->retina) {
        $this->image->save($targetPath."{$this->basename}{$suffix}@2x.{$this->extension}", 100);
        $this->image->resize(round($this->targetWidth / 2), round($this->targetHeight / 2), function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $this->image->save($targetPath."{$this->basename}{$suffix}.{$this->extension}", 100);
    } else {
        // Just save image with normal configuration.
        $this->image->save($targetPath."{$this->basename}{$suffix}.{$this->extension}", 100);
    }

    $this->reload();

    return $this;
});

// Returns the file name.
UploadedFile::macro('filename', function () {
    $this->set();

    return "{$this->basename}.{$this->extension}";
});
