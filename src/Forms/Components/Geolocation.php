<?php

namespace AAbosham\FilamentGeolocation\Forms\Components;

use Closure;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Field;

class Geolocation extends Field
{
    protected string $view = 'filament-geolocation::forms.components.geolocation';

    protected int $maximumAge = 0;

    protected int $timeout = 0;

    protected bool $enableHighAccuracy = false;

    protected bool $enableErrorMessage = true;

    protected string | HtmlString | Closure | null $errorTitle = null;

    protected string | HtmlString | Closure | null $errorNotSupportedBrowser = null;

    protected string | HtmlString | Closure | null $errorPermissionDenied = null;

    protected string | HtmlString | Closure | null $errorPositionUnavailable = null;

    protected string | HtmlString | Closure | null $errorTimeout = null;

    protected string | HtmlString | Closure | null $errorUnknownError = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-geolocation::geolocation.fieldset.label'));

        $this->helperText(__('filament-geolocation::geolocation.fieldset.helper_text'));

        $this->errorTitle(__('filament-geolocation::geolocation.messages.errors.title'));

        $this->errorNotSupportedBrowser(__('filament-geolocation::geolocation.messages.errors.not_supported_browser'));

        $this->errorPermissionDenied(__('filament-geolocation::geolocation.messages.errors.permission_denied'));

        $this->errorPositionUnavailable(__('filament-geolocation::geolocation.messages.errors.position_unavailable'));

        $this->errorTimeout(__('filament-geolocation::geolocation.messages.errors.timeout'));

        $this->errorUnknownError(__('filament-geolocation::geolocation.messages.errors.unknown_error'));
    }

    /**
     * maximumAge
     *
     * @param  mixed $maximumAge
     * @return static
     *
     * A positive long value indicating the maximum age in milliseconds of a possible cached position that is acceptable to return.
     * If set to 0, it means that the device cannot use a cached position and must attempt to retrieve the real current position.
     * If set to Infinity the device must return a cached position regardless of its age. Default: 0.
     *
     */
    public function maximumAge(int | Closure $maximumAge): static
    {
        $this->maximumAge = $maximumAge;

        return $this;
    }

    /**
     * timeout
     *
     * @param  mixed $timeout
     * @return static
     *
     * A positive long value representing the maximum length of time (in milliseconds)
     * the device is allowed to take in order to return a position. The default value is Infinity,
     * meaning that getCurrentPosition() won't return until the position is available.
     */
    public function timeout(int | Closure $timeout): static
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * enableHighAccuracy
     *
     * @param  mixed $enableHighAccuracy
     * @return static
     * A boolean value that indicates the application would like to receive the best possible results.
     * If true and if the device is able to provide a more accurate position,
     * it will do so. Note that this can result in slower response times or increased power consumption
     * (with a GPS chip on a mobile device for example). On the other hand, if false,
     * the device can take the liberty to save resources by responding more quickly and/or using less power. Default: false.
     */
    public function enableHighAccuracy(bool | Closure $condition = true): static
    {
        $this->enableHighAccuracy = $condition;

        return $this;
    }

    public function getMaximumAge(): int
    {
        return $this->evaluate($this->maximumAge);
    }

    public function getTimeout(): int
    {
        return $this->evaluate($this->timeout);
    }

    public function getEnableHighAccuracy(): bool
    {
        return $this->evaluate($this->enableHighAccuracy);
    }

    public function enableErrorMessage(bool | Closure $condition = true): static
    {
        $this->enableErrorMessage = $condition;

        return $this;
    }

    public function isEnableErrorMessage(): bool
    {
        return $this->evaluate($this->enableErrorMessage);
    }

    public function errorTitle(string | Closure | null $errorTitle): static
    {
        $this->errorTitle = $errorTitle;

        return $this;
    }

    public function getErrorTitle(): string | HtmlString | null
    {
        return $this->evaluate($this->errorTitle);
    }

    public function errorNotSupportedBrowser(string | Closure | null $errorNotSupportedBrowser): static
    {
        $this->errorNotSupportedBrowser = $errorNotSupportedBrowser;

        return $this;
    }

    public function getErrorNotSupportedBrowser(): string | HtmlString | null
    {
        return $this->evaluate($this->errorNotSupportedBrowser);
    }

    public function errorPermissionDenied(string | Closure | null $errorPermissionDenied): static
    {
        $this->errorPermissionDenied = $errorPermissionDenied;

        return $this;
    }

    public function getErrorPermissionDenied(): string | HtmlString | null
    {
        return $this->evaluate($this->errorPermissionDenied);
    }

    public function errorPositionUnavailable(string | Closure | null $errorPositionUnavailable): static
    {
        $this->errorPositionUnavailable = $errorPositionUnavailable;

        return $this;
    }

    public function getErrorPositionUnavailable(): string | HtmlString | null
    {
        return $this->evaluate($this->errorPositionUnavailable);
    }

    public function errorTimeout(string | Closure | null $errorTimeout): static
    {
        $this->errorTimeout = $errorTimeout;

        return $this;
    }

    public function getErrorTimeout(): string | HtmlString | null
    {
        return $this->evaluate($this->errorPositionUnavailable);
    }

    public function errorUnknownError(string | Closure | null $errorUnknownError): static
    {
        $this->errorUnknownError = $errorUnknownError;

        return $this;
    }

    public function getErrorUnknownError(): string | HtmlString | null
    {
        return $this->evaluate($this->errorUnknownError);
    }
}
