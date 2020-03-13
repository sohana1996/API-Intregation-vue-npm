<template>
    <div class="container">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h2 class="text-center">Country Create form</h2></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="iso">ISO:</label>
                        <input type="text" class="form-control" placeholder="Enter your first name"
                               v-model="country.iso">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Country Name:</label>
                        <input type="text" class="form-control" placeholder="Enter your last name"
                               v-model="country.country_name">

                    </div>
                    <button type="button" class="btn btn-primary" @click="storeData">Submit</button>
                    <div>
                        <h3> {{message}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // let data = {a: 1}
    export default {

        data() {
            return {
                country: {
                    iso: null,
                    country_name: null,
                },
                message: null
            }
        },

        methods: {
            storeData() {
                fetch('/api/country/store', {
                    method: 'POST',
                    body: JSON.stringify(this.country),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                    .then(response => response.json())
                    .then(json => {
                            this.message = "data store successfully"
                        }
                    )
            },
        }
    }
</script>
