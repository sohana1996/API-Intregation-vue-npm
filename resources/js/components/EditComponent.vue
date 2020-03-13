<template>
    <div class="container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header"> <h2 class="text-center">Edit Country: </h2></div>
            <div class="card-body">

                    <div class="form-group">
                        <label for="email">ISO:</label>
                        <input type="text" class="form-control" placeholder="Enter your first name" v-model="country.iso">
                    </div>
                    <div class="form-group">
                        <label for="email">Country Name:</label>
                        <input type="text" class="form-control" placeholder="Enter your last name" v-model="country.country_name">
                    </div>
                    <button type="button" class="btn btn-primary" @click="updateData">Update</button>
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
        name: 'edit',
        data () {
            return {
                country: {
                    id: null,
                    iso: null,
                    country_name: null,
                },
                message: null
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                let _this = this;
                fetch('/api/country/' + value, {
                    method: 'GET',
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                    .then(response => response.json())
                    .then(json => {
                        _this.country.id = json.data.id;
                        _this.country.iso = json.data.iso;
                        _this.country.country_name = json.data.country_name;
                    });
            },
            updateData() {
                alert('Are you want to Edit?');
                fetch('/api/country/update/'+value, {
                    method: 'PUT',
                    body: JSON.stringify(this.country),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                    .then(response => {
                        console.log(response)
                        response.json()
                    })
                    .then(json => {
                            this.message = "data update successfully"
                        }
                    );
                location.reload();
            },
        }
    }
</script>
