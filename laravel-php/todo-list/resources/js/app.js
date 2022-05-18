require("./bootstrap");
import Vue from "vue";

import { Library } from "@fortawesome/fontawesome-svg-core";
import { faPlustSquare, faTrash } from "@fortawesome/free-solid-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

Library.add(faPlustSquare, faTrash);

vue.component("font-awesine-icon", FontAwesomeIcon);
import App from "./vue/app";
import { vue } from "laravel-mix";
const app = new Vue({
    el: "#app",
    components: { App },
});
