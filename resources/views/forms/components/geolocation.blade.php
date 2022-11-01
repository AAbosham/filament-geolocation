<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    >
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}').defer,
        options: {
            maximumAge: @js($getMaximumAge()),
            timeout: @js($getTimeout()),
            enableHighAccuracy: @js($getEnableHighAccuracy()),
        },
        getLocation: function() {
            setInterval(navigator.geolocation.watchPosition(this.showPosition, this.showError, this.options));
        },
        init: function() {
            if (navigator.geolocation) {
                this.getLocation()
            } else {
                new Notification()
                    .title('{{ $getErrorTitle() }}')
                    .body('{{ $getErrorNotSupportedBrowser() }}')
                    .send();
            }
        },
        showPosition(position) {
            this.state = position.coords;

            $wire.set('{{ $getStatePath() }}', {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
                altitude: position.coords.altitude,
                accuracy: position.coords.accuracy,
                altitudeAccuracy: position.coords.altitudeAccuracy,
                heading: position.coords.heading,
                speed: position.coords.speed,
            });
        },
        showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    new Notification()
                        .warning()
                        .title('{{ $getErrorTitle() }}')
                        .body('{{ $getErrorPermissionDenied() }}')
                        .send();
                    break;
                case error.POSITION_UNAVAILABLE:
                    new Notification()
                        .warning()
                        .title('{{ $getErrorTitle() }}')
                        .body('{{ $getErrorPositionUnavailable() }}')
                        .send();
                    break;
                case error.TIMEOUT:
                    new Notification()
                        .warning()
                        .title('{{ $getErrorTitle() }}')
                        .body('{{ $getErrorTimeout() }}')
                        .send();
                    break;
                case error.UNKNOWN_ERROR:
                    new Notification()
                        .warning()
                        .title('{{ $getErrorTitle() }}')
                        .body('{{ $getErrorUnknownError() }}')
                        .send();
                    break;
            }
        }
    }">
    </div>
</x-dynamic-component>
