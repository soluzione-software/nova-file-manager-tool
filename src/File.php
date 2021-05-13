<?php

namespace SoluzioneSoftware\Nova\Tools\FileManager;

use Laravel\Nova\Fields\Field;

class File extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'file-manager-field';

    /**
     * The URL of the file manager.
     *
     * @var string
     */
    private $fileManagerUrl = '/filemanager';

    /**
     * Set the file manager url to be used.
     *
     * @param  string  $url
     * @return self
     */
    public function fileManagerUrl(string $url): self
    {
        $this->fileManagerUrl = $url;
        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'url' => $this->fileManagerUrl,
        ]);
    }
}
