<template>
    <div>
        
        <div class="md-layout md-gutter">
            
            <div class="md-layout-item">
                <md-field>
                    <label for="four_on_four">4X4 </label>
                    <md-select v-model="four_on_four" name="movie" id="movie">
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
                        placeholder="crusie_control"
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
            <div class="md-layout-item">
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
        </div>

        <md-button class="md-primary md-raised" @click="movie = 'pulp-fiction'"
            >חיפוש</md-button
        >
    </div>
</template>

<script>
export default {
    name: "BasicSelect",
    data: () => ({
        movie: "godfather",
        country: null,
        font: null,
    }),
};
</script>
