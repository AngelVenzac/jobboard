module.exports = app => {
    const advertisements = require("../controllers/advertisement.controller.js");

    // Create a new advertisement
    app.post("/advertisement", advertisements.create);

    // Retrieve all advertisements
    app.get("/advertisement", advertisements.findAll);

    // Retrieve a single advertisement with advertisementId
    app.get("/advertisement/:advertisementId", advertisements.findOne);

    // Update a advertisement with advertisementId
    app.put("/advertisement/:advertisementId", advertisements.update);

    // Delete a advertisement with advertisementId
    app.delete("/advertisement/:advertisementId", advertisements.delete);

    // Create a new advertisement
    app.delete("/advertisement", advertisements.deleteAll);

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