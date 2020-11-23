const Advertisement = require("../models/advertisement.model.js");

exports.create = (req, res) => {
    // Validate request
    if (!req.body) {
        res.status(400).send({
            message: "Content can not be empty!"
        });
    }

    // Create a advertisement
    const advertisement = new Advertisement({
        name: req.body.name,
        description: req.body.description,
        category: req.body.category,
        lieu: req.body.lieu,
        salary: req.body.salary,
        duration: req.body.duration,
        company: req.body.company
    });

    // Save advertisement in the database
    Advertisement.create(advertisement, (err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while creating the advertisement."
            });
        else res.send(data);
    });
};

exports.findAll = (req, res) => {
    Advertisement.getAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while retrieving advertisements."
            });
        else res.send(data);
    });
};

exports.findOne = (req, res) => {
    Advertisement.findById(req.params.advertisementId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found advertisement with id ${req.params.advertisementId}.`
                });
            } else {
                res.status(500).send({
                    message: "Error retrieving advertisement with id " + req.params.advertisementId
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

    Advertisement.updateById(
      req.params.advertisementId,
      new Advertisement(req.body),
      (err, data) => {
          if (err) {
              if (err.kind === "not_found") {
                  res.status(404).send({
                      message: `Not found advertisement with id ${req.params.advertisementId}.`
                  });
              } else {
                  res.status(500).send({
                      message: "Error updating advertisement with id " + req.params.advertisementId
                  });
              }
          } else res.send(data);
      }
    );
};

exports.delete = (req, res) => {
    Advertisement.remove(req.params.advertisementId, (err, data) => {
        if (err) {
            if (err.kind === "not_found") {
                res.status(404).send({
                    message: `Not found advertisement with id ${req.params.advertisementId}.`
                });
            } else {
                res.status(500).send({
                    message: "Could not delete advertisement with id " + req.params.advertisementId
                });
            }
        } else res.send({ message: `advertisement was deleted successfully!` });
    });
};

exports.deleteAll = (req, res) => {
    Advertisement.removeAll((err, data) => {
        if (err)
            res.status(500).send({
                message:
                  err.message || "Some error occurred while removing all advertisements."
            });
        else res.send({ message: `All advertisements were deleted successfully!` });
    });
};