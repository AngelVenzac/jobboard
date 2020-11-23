module.exports = app => {
    const applications = require("../controllers/application.controller.js");

    // Create a new application
    app.post("/application", applications.create);

    // Retrieve all applications
    app.get("/application", applications.findAll);

    // Retrieve a single application with applicationId
    app.get("/application/:applicationId", applications.findOne);

    // Update a application with applicationId
    app.put("/application/:applicationId", applications.update);

    // Delete a application with applicationId
    app.delete("/application/:applicationId", applications.delete);

    // Create a new application
    app.delete("/application", applications.deleteAll);

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