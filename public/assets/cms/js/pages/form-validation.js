// -------------------------------
// Validation message style
// -------------------------------
const errorMessageClasses = (additionalClasses = null) => {
    return `mt-2 text-danger ${additionalClasses}`;
}

// -------------------------------
// Validation message generator
// -------------------------------
const messageRequired = (field) => {
    return `Please enter your ${field}.`;
}

const messageEmail = () => {
    return `Please enter a valid email address.`;
}

const messageMinLength = (field, length) => {
    return `The ${field} must be at least ${length} characters.`;
}

const messageEqualTo = (field) => {
    return `The ${field} confirmation does not match.`;
}

const messageExtension = (field, extensions) => {
    return `Your ${field} file extension should match ${extensions} format.`;
}

const messageFileSize = (field, size) => {
    return `Your ${field} should be smaller than ${size}.`;
}