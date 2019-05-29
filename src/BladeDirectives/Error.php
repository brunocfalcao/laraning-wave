<?php

namespace Laraning\Wave\BladeDirectives;

class Error
{
    protected $errorsBag;
    protected $field;
    protected $class;

    public function __construct(string $errorsBag = null, $field = null, $class = 'invalid-feedback')
    {
        [$this->errorsBag, $this->field, $this->class] = [collect(json_decode($errorsBag)), $field, $class];
    }

    /**
     * Renders the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $message = null;

        if ($this->field != null) {
            if ($this->errorsBag->has($this->field)) {
                $message = optional($this->errorsBag[$this->field])[0];
            }
        } else {
            $message = $this->errorsBag->first()[0];
        }

        if ($message != null) {
            return "<span class='{$this->class}'><strong>{$message}</strong></span>";
        }
    }
}
