<script>
    // Get validator error classes
    const errorClasses = (additional = null) => {
        return `mt-2 text-danger ${additional}`;
    }

    // Generate validator "required" message
    const validatorRequiredMessage = (attribute) => {
        return `{{ __('validation.required', ['attribute' => '${attribute}']) }}`;
    }

    // Generate validator "email" message
    const validatorEmailMessage = (attribute) => {
        return `{{ __('validation.email', ['attribute' => '${attribute}']) }}`;
    }

    // Generate validator "mimes" message
    const validatorMimesMessage = (attribute, values) => {
        return `{{ __('validation.mimes', ['attribute' => '${attribute}', 'values' => '${values}']) }}`;
    }

    // Generate validator "confirmed" message
    const validatorConfirmedMessage = (attribute) => {
        return `{{ __('validation.confirmed', ['attribute' => '${attribute}']) }}`;
    }

    // Generate validator "min" message
    const validatorMinMessage = (attribute, min, type) => {
        switch (type) {
            case 'numeric':
                return `{{ __('validation.min.numeric', ['attribute' => '${attribute}', 'min' => '${min}']) }}`;
            case 'file':
                return `{{ __('validation.min.file', ['attribute' => '${attribute}', 'min' => '${min}']) }}`;
            case 'string':
                return `{{ __('validation.min.string', ['attribute' => '${attribute}', 'min' => '${min}']) }}`;
            case 'array':
                return `{{ __('validation.min.array', ['attribute' => '${attribute}', 'min' => '${min}']) }}`;
        }
    }

    // Generate validator "max" message
    const validatorMaxMessage = (attribute, max, type) => {
        switch (type) {
            case 'numeric':
                return `{{ __('validation.max.numeric', ['attribute' => '${attribute}', 'max' => '${max}']) }}`;
            case 'file':
                return `{{ __('validation.max.file', ['attribute' => '${attribute}', 'max' => '${max}']) }}`;
            case 'string':
                return `{{ __('validation.max.string', ['attribute' => '${attribute}', 'max' => '${max}']) }}`;
            case 'array':
                return `{{ __('validation.max.array', ['attribute' => '${attribute}', 'max' => '${max}']) }}`;
        }
    }
</script>
