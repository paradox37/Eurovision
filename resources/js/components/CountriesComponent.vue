<template>
    <div>
        <div v-if="!submitted">
            <h3 class="mb-5">Please vote below</h3>
            <template v-if="serverErrors">
                <template v-for="messages in serverErrors">
                    <template v-for="message in messages">
                        <p class="error">{{ message }}</p>
                    </template>
                </template>
            </template>
            <form v-on:submit.prevent="onSubmit">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Points</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(vote, voteIndex) in votes" :key="vote.id">
                        <td>{{ vote.score }}</td>
                        <td>
                            <select
                                    v-validate="'required|excluded:0'"
                                    :name="'country_'+vote.id"
                                    class="form-control"
                                    v-model="selectedCountry[voteIndex]"
                                    @change="onChange(voteIndex)">
                                <option :value="0" disabled selected>Please choose the country</option>
                                <template v-for="(country, countryIndex) in countries[voteIndex]">
                                    <option :disabled="country.disabled" :selected="false" :value="country.id">
                                        {{ country.title }}
                                    </option>
                                </template>
                            </select>
                            <span class="error">{{ errors.first('country_' + vote.id) }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button class="btn btn-primary" :disabled="errors.any() || processing">Submit</button>
                </div>
            </form>
        </div>
        <div v-else>
            <h3 class="mb-5">Thank you</h3>
            <p>Your votes are successfully submitted. You will be redirected to the Countries page in {{countdown}} seconds.</p>
        </div>
    </div>
</template>

<style scoped>
    .error {
        font-size: 12px;
        color: red;
    }
</style>

<script>
    import axios from 'axios';
    import {Validator} from 'vee-validate';


    export default {
        name: 'countries-component',
        props: ["country_id"],
        data: () => ({
            countries: [],
            votes: [],
            selectedCountry: [],
            dictionary: {
                custom: {}
            },
            submitted: false,
            countdown: 5,
            serverErrors: null,
            processing: false
        }),
        mounted() {
            this.getVotes();
        },
        methods: {
            getVotes() {
                axios({
                    url: '/api/votes',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                }).then(res => {
                    this.votes = res.data;

                    this.getCountries();
                });
            },
            getCountries() {
                axios({
                    url: '/api/countries',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    params: {
                        country_id: this.country_id
                    }
                }).then(res => {
                    this.votes.forEach((vote) => {
                        this.dictionary.custom['country_' + vote.id] = {excluded: 'You must select the country from the list'};
                        Validator.localize('en', this.dictionary);

                        this.selectedCountry.push(0);
                        let data = this.addState(res.data);
                        this.countries.push(data);
//                        console.log(this.countries);
                    });
                });
            },
            addState(data) {
                let newData = [];
                data.forEach(obj => {
                    newData.push(Object.assign({}, obj, {disabled: false}));
                });
                return newData;
            },
            onChange(voteIndex) {
                this.resetCountriesState();
                this.selectedCountry.forEach((countryId, index) => {
                        this.countries.forEach((countries, countriesIndex) => {
                            if (countriesIndex !== voteIndex) {
                                countries.forEach((country, countryIndex) => {
                                    if (country.id == countryId) {
                                        this.countries[countriesIndex][countryIndex]['disabled'] = true;
                                    }
                                })
                            }
                        });
                    }
                )
            },
            resetCountriesState() {
                this.countries.forEach((countries, countriesIndex) => {
                    countries.forEach((country, countryIndex) => {
                        this.countries[countriesIndex][countryIndex]['disabled'] = false;
                    })
                })
            },
            onSubmit() {
                this.serverErrors = [];
                this.processing = true;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let votes = this.votes.map((value, index) => {
                            return value.id
                        });
                        axios({
                            url: '/api/vote',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            data: {
                                votes: votes,
                                countries: this.selectedCountry,
                                id: this.country_id
                            }
                        }).then(() => {
                            this.submitted = true;
                            setInterval(() => {
                                this.countdown--;
                                if (this.countdown == 0) {
                                    window.location.replace('/countries')
                                }
                            }, 1000)
                        }).catch((errors) => {
                            this.processing = false;
                            this.serverErrors = errors.response.data.errors;
                            console.log('this.serverErrors', this.serverErrors);
                        })
                    }
                });
            }
        }
    }
</script>