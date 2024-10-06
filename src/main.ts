import loginMethodSelect from "./components/loginMethodSelect";
import fetchApiData from "./components/fetchApiData";
import fetchCustomPostTypeData from "./components/fetchCustomPostTypeData";
import addMetafieldInputs from "./components/addMetafieldInputs";

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
    addMetafieldInputs();
};

init();

