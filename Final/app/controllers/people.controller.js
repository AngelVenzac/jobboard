const People = require("../models/people.model.js");

exports.create = (req, res) => {
    // Validate request
    if (!req.body) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
    }

    // Create a people
    const people = new People({
        name: req.body.name,
        description: req.body.description,
        category: req.body.category,
        mail: req.body.mail
    });

    // Save people in the database
    People.create(people, (err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while creating the people."
            });
        else res.send(data);
    });
};

exports.findAll = (req, res) => {
    People.getAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while retrieving peoples."
            });
        else res.send(data);
    });
};

exports.findOne = (req, res) => {
    People.findById(req.params.peopleId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found people with id ${req.params.peopleId}.`
                });
            } else {
                res.status(500).send({
                    message: "Error retrieving people with id " + req.params.peopleId
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

    People.updateById(
      req.params.peopleId,
      new People(req.body),
      (err, data) => {
          if (err) {
              if (err.kind === "not_found") {
                  res.status(404).send({
                      message: `Not found people with id ${req.params.peopleId}.`
                  });
              } else {
                  res.status(500).send({
                      message: "Error updating people with id " + req.params.peopleId
                  });
              }
          } else res.send(data);
      }
    );
};

exports.delete = (req, res) => {
    People.remove(req.params.peopleId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found people with id ${req.params.peopleId}.`
                });
            } else {
                res.status(500).send({
                    message: "Could not delete people with id " + req.params.peopleId
                });
            }
        } else res.send({ message: `people was deleted successfully!` });
    });
};

exports.deleteAll = (req, res) => {
    People.removeAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while removing all peoples."
            });
        else res.send({ message: `All peoples were deleted successfully!` });
    });
};