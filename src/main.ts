import loginMethodSelect from "./components/loginMethodSelect";
import fetchApiData from "./components/fetchApiData";
import fetchCustomPostTypeData from "./components/fetchCustomPostTypeData";

declare global {
    interface Window {
        admin_globals: {
            ajax_url: string;
            home_url: string;
        };

    }
}


const init = () => {
    loginMethodSelect();
    fetchApiData();
    fetchCustomPostTypeData();
};

init();

