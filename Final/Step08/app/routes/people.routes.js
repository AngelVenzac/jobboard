module.exports = app => {
    const peoples = require("../controllers/people.controller.js");

    // Create a new people
    app.post("/people", peoples.create);

    // Retrieve all peoples
    app.get("/people", peoples.findAll);

    // Retrieve a single people with peopleId
    app.get("/people/:peopleId", peoples.findOne);

    // Update a people with peopleId
    app.put("/people/:peopleId", peoples.update);

    // Delete a people with peopleId
    app.delete("/people/:peopleId", peoples.delete);

    // Create a new people
    app.delete("/people", peoples.deleteAll);

    app.use(function (req, res, next) {

        // Website you wish to allow to connect
        res.setHeader('Access-Control-Allow-Origin','*');

        // Request methods you wish to allow
        res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

        // Request headers you wish to allow
        res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

        // Set to true if you need the website to include cookies in the requests sent
        // to the API (e.g. in case you use sessions)
        res.setHeader('Access-Control-Allow-Credentials', true);

        // Pass to next layer of middleware
        next();
    });
};