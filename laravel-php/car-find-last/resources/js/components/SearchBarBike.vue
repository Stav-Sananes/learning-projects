<template>
    <div>
        <div
            class="md-layout md-alignment-top-center"
            v-if="this.set_table == 1"
        >
            <md-button class="md-primary md-raised" @click="getResults"
                >חיפוש מחדש</md-button
            >
            <md-button class="md-accent md-raised" @click="setHomeScreen()"
                >חזרה למסך הבית</md-button
            >
        </div>
        <div class="md-layout md-gutter">
            <div class="md-layout-item">
                <md-field>
                    <label for="fuel_captacity">קיבולת דלק</label>
                    <md-select
                        v-model="fuel_captacity"
                        name="fuel_captacity"
                        id="fuel_captacity"
                    >
                        <md-option value="1">1</md-option>
                        <md-option value="2">2</md-option>
                        <md-option value="3">3</md-option>
                        <md-option value="4">4</md-option>
                        <md-option value="5">5</md-option>
                        <md-option value="6">6</md-option>
                        <md-option value="7">7</md-option>
                        <md-option value="8">8</md-option>
                        <md-option value="9">9</md-option>
                        <md-option value="10">10</md-option>
                        <md-option value="11">11</md-option>
                        <md-option value="12">12</md-option>
                        <md-option value="13">13</md-option>
                        <md-option value="14">14</md-option>
                        <md-option value="15">15</md-option>
                    </md-select>
                </md-field>
            </div>

            <div class="md-layout-item">
                <md-field>
                    <label for="starter">סטרטר מותאם אישית</label>
                    <md-select
                        v-model="starter"
                        name="starter"
                        id="starter"
                        placeholder="סטרטר מותאם אישית"
                    >
                        <md-option value="0">לא</md-option>
                        <md-option value="1">כן</md-option>
                    </md-select>
                </md-field>
            </div>

            <div class="md-layout-item">
                <md-field>
                    <label for="model_of_bike">סוג אופנוע</label>
                    <md-select
                        v-model="model_of_bike"
                        name="model_of_bike"
                        id="model_of_bike"
                    >
                        <md-option value="Sport">ספורט</md-option>
                        <md-option value="Cruiser">קרוזר</md-option>
                        <md-option value="Touring">טיולים</md-option>
                        <md-option value="Off-Road">שטח</md-option>
                        <md-option value="Scooter">טוסטוס</md-option>
                        <md-option value="Track">מירוצים</md-option>
                        <md-option value="Standard">רגיל</md-option>
                        <md-option value="Electric">חשמלי</md-option>
                        <md-option value="Sport-Touring">ספורט טיולי</md-option>
                        <md-option value="On-Off-Road">On-Off-Road</md-option>
                        <md-option value="Youth">צעירים</md-option>
                        <md-option value="Touring-Scooter"
                            >טוסטוס טיולי</md-option
                        >
                    </md-select>
                </md-field>
            </div>
            <div class="md-layout-item">
                <md-field>
                    <label for="price">מחיר</label>
                    <md-input
                        v-model="price"
                        :value="price"
                        placeholder="הכנס מחיר"
                        style="text-align: center"
                    ></md-input>
                </md-field>
            </div>
            <div class="md-layout-item mt">
                <md-field>
                    <label for="engine_type">סוג מנוע</label>
                    <md-select
                        v-model="engine_type"
                        name="engine_type"
                        id="engine_type"
                    >
                        <md-option value="Single Cylinder"
                            >בעל צילנדר אחד</md-option
                        >
                        <md-option value="Inline Triple and Four">
                            מנוע מוטבע עם שלוש וארבע</md-option
                        >
                        <md-option value="V Engines">V Engines</md-option>
                        <md-option value="V Twin">V Twin</md-option>
                        <md-option value="V Four">V Four</md-option>
                        <md-option value="Flat Engines"
                            >מנועים שטוחים</md-option
                        >
                        <md-option value="Flat 2">שטוחים עם 2</md-option>
                        <md-option value="Flat 4">שטוח עם 4</md-option>
                    </md-select>
                </md-field>
            </div>
            <div class="w-100 d-flex justify-content-center text-center">
                <table class="table table-bordered" v-if="this.set_table == 1">
                    <thead>
                        <tr>
                            <th scope="col">שם אופנוע</th>
                            <th scope="col">חברת האופנוע</th>
                            <th scope="col">מחיר</th>
                            <th scope="col">סוג אופנוע</th>
                            <th scope="col">צילנדרים</th>
                            <th scope="col">סוג מנוע</th>
                            <th scope="col">סוג הפצה באופנוע</th>
                            <th scope="col">קיבולת דלק</th>
                            <th scope="col">מערכת קירור</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="bike in bikes" :key="bike.id">
                            <th scope="row">{{ bike.bike_name }}</th>
                            <td>{{ bike.brand }}</td>
                            <td>{{ bike.price | currency("₪") }}</td>
                            <td>{{ bike.model_of_bike }}</td>
                            <td>{{ bike.cylinders }}</td>
                            <td>{{ bike.engine_type }}</td>

                            <td v-if="bike.transmission_type == 0">
                                Automatic Transmission
                            </td>
                            <td v-if="bike.transmission_type == 1">
                                Manual Transmission
                            </td>
                            <td v-if="bike.transmission_type == 2">
                                Automated Manual Transmission
                            </td>
                            <td v-if="bike.transmission_type == 3">
                                Continuously Variable Transmission
                            </td>
                            <td>{{ bike.fuel_captacity }}</td>

                            <td v-if="bike.cooling_system == 0">נוזלית</td>
                            <td v-if="bike.cooling_system == 1">
                                מערכת קירור אוויר ושמן
                            </td>
                            <td v-if="bike.cooling_system == 2">
                                מערכת קירור אוויר
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="md-layout md-alignment-top-center"
                v-if="this.set_table == 0"
            >
                <md-button class="md-primary md-raised" @click="getResults"
                    >חיפוש</md-button
                >
                <md-button class="md-accent md-raised" @click="setHomeScreen()"
                    >חזרה למסך הבית</md-button
                >
            </div>
        </div>
    </div>
</template>

<script>
import Vue2Filters from "vue2-filters";
Vue.use(Vue2Filters);
export default {
    data() {
        return {
            brand: null,
            model_of_bike: null,
            engine_type: null,
            cylinders: null,
            starter: null,
            car_pollution: null,
            transmission_type: null,
            price: null,
            fuel_captacity: null,
            engine_stroke: null,
            cooling_system: null,
            bikes: [],
            set_table: 0,
        };
    },
    methods: {
        getResults() {
            axios
                .get("/advanced_search_bike", {
                    params: {
                        fuel_captacity: this.fuel_captacity,
                        starter: this.starter,
                        model_of_bike: this.model_of_bike,
                        price: this.price,
                        engine_type: this.engine_type,
                    },
                })
                .then((res) => {
                    this.bikes = res.data;
                    this.set_table = 1;
                })

                .catch((error) => {
                    console.log(error);
                });
        },
        setHomeScreen() {
            window.location = "/";
        },
    },
};
</script>
