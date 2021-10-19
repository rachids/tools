import axios from "axios";
import useQueryParamBuilder from "./useQueryParamBuilder";

export default function useApi() {
    const { buildQueryParams } = useQueryParamBuilder();

    const api = axios.create({
        baseURL: process.env.MIX_API_URL,
    });

    const fetchFromApi = async (uri, options = {}) => {
        let uriWithParams = uri + '?' + buildQueryParams(options);
        return await api.get(uriWithParams);
    }

    return {
        api,
        fetchFromApi,
    }
}
