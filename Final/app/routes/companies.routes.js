module.exports = app => {
    const companies = require("../controllers/companies.controller.js");

    // Create a new companies
    app.post("/companies", companies.create);

    // Retrieve all companiess
    app.get("/companies", companies.findAll);

    // Retrieve a single companies with companiesId
    app.get("/companies/:companiesId", companies.findOne);

    // Update a companies with companiesId
    app.put("/companies/:companiesId", companies.update);

    // Delete a companies with companiesId
    app.delete("/companies/:companiesId", companies.delete);

    // Create a new companies
    app.delete("/companies", companies.deleteAll);

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