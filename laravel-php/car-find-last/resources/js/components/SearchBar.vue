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
                    <label for="four_on_four">4X4 </label>
                    <md-select
                        v-model="four_on_four"
                        name="four_on_four"
                        id="four_on_four"
                    >
                        <md-option value="0">לא</md-option>
                        <md-option value="1">כן</md-option>
                    </md-select>
                </md-field>
            </div>

            <div class="md-layout-item">
                <md-field>
                    <label for="crusie_control">בקרת שיוט </label>
                    <md-select
                        v-model="crusie_control"
                        name="crusie_control"
                        id="crusie_control"
                        placeholder="בקרת שיוט"
                    >
                        <md-option value="0">לא</md-option>
                        <md-option value="1">כן</md-option>
                    </md-select>
                </md-field>
            </div>

            <div class="md-layout-item">
                <md-field>
                    <label for="number_of_seats">מקומות ישיבה</label>
                    <md-select
                        v-model="number_of_seats"
                        name="number_of_seats"
                        id="number_of_seats"
                    >
                        <md-option value="2">2</md-option>
                        <md-option value="5">5</md-option>
                    </md-select>
                </md-field>
            </div>
            <div class="md-layout-item">
                <md-field>
                    <label for="autonomous_braking">מערכת בלימה אוטונמית</label>
                    <md-select
                        v-model="autonomous_braking"
                        name="autonomous_braking"
                        id="autonomous_braking"
                    >
                        <md-option value="0">לא</md-option>
                        <md-option value="1">כן</md-option>
                    </md-select>
                </md-field>
            </div>
            <div class="md-layout-item mt">
                <md-field>
                    <label for="type_of_car">סוג מכונית</label>
                    <md-select
                        v-model="type_of_car"
                        name="type_of_car"
                        id="type_of_car"
                    >
                        <md-option value="0">מנהלים</md-option>
                        <md-option value="1">משפחתי</md-option>
                        <md-option value="2">ספורט</md-option>
                    </md-select>
                </md-field>
            </div>
            <div class="w-100 d-flex justify-content-center text-center">
                <table class="table table-bordered" v-if="this.set_table == 1">
                    <thead>
                        <tr>
                            <th scope="col">שם רכב</th>
                            <th scope="col">חברת הרכב</th>
                            <th scope="col">ליטר בגאז</th>
                            <th scope="col">4X4</th>
                            <th scope="col">בעל בקרת שיוט</th>
                            <th scope="col">מצלמת רוורס</th>
                            <th scope="col">מערכת בלימה אוטונומית</th>
                            <th scope="col">מקומות ישיבה</th>
                            <th scope="col">סוג מכונית</th>
                            <th scope="col">מחיר</th>
                            <th scope="col">דרגת זיהום ברכב</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="car in cars" :key="car.id">
                            <th scope="row">{{ car.car_name }}</th>
                            <td>{{ car.brand }}</td>
                            <td>{{ car.liter_baggage }}</td>
                            <td>{{ car.four_on_four ? "כן" : "לא" }}</td>
                            <td>{{ car.crusie_control ? "כן" : "לא" }}</td>
                            <td>{{ car.reverse_camera == 0 ? "לא" : "כן" }}</td>
                            <td>
                                {{ car.autonomous_braking ? "כן" : "ללא" }}
                            </td>
                            <td v-if="car.type_of_car == 0">ספורט</td>
                            <td v-if="car.type_of_car == 1">משפחתי</td>
                            <td v-if="car.type_of_car == 2">מנהלים</td>
                            <td>{{ car.number_of_seats }}</td>
                            <td>{{ car.price | currency("₪") }}</td>

                            <td>{{ car.car_pollution }}</td>
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
            type_of_car: null,
            number_of_seats: null,
            crusie_control: null,
            four_on_four: null,
            autonomous_braking: null,
            car_pollution: null,
            model_of_car: null,
            price: null,
            reverse_camera: null,
            liter_baggage: null,
            cars: [],
            set_table: 0,
        };
    },
    methods: {
        getResults() {
            axios
                .get("/advanced_search", {
                    params: {
                        four_on_four: this.four_on_four,
                        autonomous_braking: this.autonomous_braking,
                        number_of_seats: this.number_of_seats,
                        crusie_control: this.crusie_control,
                        type_of_car: this.type_of_car,
                    },
                })
                .then((res) => {
                    this.cars = res.data;
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
