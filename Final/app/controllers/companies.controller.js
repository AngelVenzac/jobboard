const Companies = require("../models/companies.model.js");

exports.create = (req, res) => {
    // Validate request
    if (!req.body) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
    }

    // Create a companies
    const companies = new Companies({
        name: req.body.name,
        category: req.body.category
    });

    // Save companies in the database
    Companies.create(companies, (err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while creating the companies."
            });
        else res.send(data);
    });
};

exports.findAll = (req, res) => {
    Companies.getAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while retrieving companiess."
            });
        else res.send(data);
    });
};

exports.findOne = (req, res) => {
    Companies.findById(req.params.companiesId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found companies with id ${req.params.companiesId}.`
                });
            } else {
                res.status(500).send({
                    message: "Error retrieving companies with id " + req.params.companiesId
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

    Companies.updateById(
      req.params.companiesId,
      new Companies(req.body),
      (err, data) => {
          if (err) {
              if (err.kind === "not_found") {
                  res.status(404).send({
                      message: `Not found companies with id ${req.params.companiesId}.`
                  });
              } else {
                  res.status(500).send({
                      message: "Error updating companies with id " + req.params.companiesId
                  });
              }
          } else res.send(data);
      }
    );
};

exports.delete = (req, res) => {
    Companies.remove(req.params.companiesId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found companies with id ${req.params.companiesId}.`
                });
            } else {
                res.status(500).send({
                    message: "Could not delete companies with id " + req.params.companiesId
                });
            }
        } else res.send({ message: `companies was deleted successfully!` });
    });
};

exports.deleteAll = (req, res) => {
    Companies.removeAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while removing all companiess."
            });
        else res.send({ message: `All companiess were deleted successfully!` });
    });
};