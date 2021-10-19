export default function useQueryParamBuilder() {
    const buildQueryParams = (options) => {
        return Object.keys(options)
            .map(key => `${key}=${options[key]}`)
            .join('&');
    }

    return {
        buildQueryParams,
    }
}
