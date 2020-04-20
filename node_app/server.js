var Echo = require("laravel-echo-server");

var host = null;

if (process.env.NODE_HOST != 'null') {
    host = process.env.NODE_HOST;
}

var options = {
    "authHost": process.env.AUTH_HOST,
    "authEndpoint": "/broadcasting/auth",
    "clients": {},
    "database": "redis",
    "databaseConfig": {
        "redis": {
            "host": process.env.REDIS_HOST,
            "port": process.env.REDIS_PORT
        }
    },

    "devMode": process.env.DEV_MODE,
    "host": host,
    "port": process.env.PORT,
    "protocol": process.env.PROTOCOL,
    "subscribers": {
        "http": true,
        "redis": true
    },

    "apiOriginAllow": {
        "allowCors": true,
        "allowOrigin": "http://localhost:8080",
        "allowMethods": "GET, POST",
        "allowHeaders": "Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id"
    }
};

Echo.run(options);

