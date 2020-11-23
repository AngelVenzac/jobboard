const Application = require("../models/application.model.js");

exports.create = (req, res) => {
    // Validate request
    if (!req.body) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
    }

    // Create a application
    const application = new Application({
        mails: req.body.mails,
        people: req.body.people,
        ad: req.body.ad
    });

    // Save application in the database
    Application.create(application, (err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while creating the application."
            });
        else res.send(data);
    });
};

exports.findAll = (req, res) => {
    Application.getAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while retrieving applications."
            });
        else res.send(data);
    });
};

exports.findOne = (req, res) => {
    Application.findById(req.params.applicationId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found application with id ${req.params.applicationId}.`
                });
            } else {
                res.status(500).send({
                    message: "Error retrieving application with id " + req.params.applicationId
                });
            }
        } else res.send(data);
    });
};

exports.update = (req, res) => {
    // Validate Request
    if (!req.body) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
    }

    Application.updateById(
      req.params.applicationId,
      new Application(req.body),
      (err, data) => {
          if (err) {
              if (err.kind === "not_found") {
                  res.status(404).send({
                      message: `Not found application with id ${req.params.applicationId}.`
                  });
              } else {
                  res.status(500).send({
                      message: "Error updating application with id " + req.params.applicationId
                  });
              }
          } else res.send(data);
      }
    );
};

exports.delete = (req, res) => {
    Application.remove(req.params.applicationId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found application with id ${req.params.applicationId}.`
                });
            } else {
                res.status(500).send({
                    message: "Could not delete application with id " + req.params.applicationId
                });
            }
        } else res.send({ message: `application was deleted successfully!` });
    });
};

exports.deleteAll = (req, res) => {
    Application.removeAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while removing all applications."
            });
        else res.send({ message: `All applications were deleted successfully!` });
    });
};