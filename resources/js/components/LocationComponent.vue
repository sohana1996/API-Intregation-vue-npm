<template>
    <div class="container">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body"><h1 class="text-center">Country List : </h1>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="10%" class="text-left">Client IP</th>
                                <th width="20%" class="text-left">Time Zone</th>
                                <th width="50%" class="text-center">UTC Date Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="10%" class="text-left">{{location.client_ip}}</td>
                                <td width="20%" class="text-left">{{location.timezone}}</td>
                                <td width="50%" class="text-center">{{location.utc_datetime}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'location',
        data() {
            return {
                location: [],
            }
        },

        mounted() {
            this.showLocation();
        },

        methods: {
            showLocation() {
                fetch('/api/getLocation', {
                    method: 'get',
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                    .then(response => response.json())
                    .then(res => {
                        // console.log(res.data)
                        this.location = res.data;
                    })
            },

        }
    };
</script>
