const sql = require("./db.js");

// constructor
const Advertisement = function(advertisement) {
    
    this.name = advertisement.name
    this.description = advertisement.description;
    this.category = advertisement.category;
    this.lieu = advertisement.lieu;
    this.salary = advertisement.salary;
    this.duration = advertisement.duration;
    this.company = advertisement.company;
};

Advertisement.create = (newAdvertisement, result) => {
    sql.query("INSERT INTO advertisement SET ?", newAdvertisement, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        console.log("created advertisement: ", { id: res.insertId, ...newAdvertisement });
        result(null, { id: res.insertId, ...newAdvertisement });
    });
};

Advertisement.findById = (advertisementId, result) => {
    sql.query(`SELECT * FROM advertisement WHERE id = ${advertisementId}`, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        if (res.length) {
            console.log("found advertisement: ", res[0]);
            result(null, res[0]);
            return;
        }

        // not found Advertisement with the id
        result({ kind: "not_found" }, null);
    });
};

Advertisement.getAll = result => {
    sql.query("SELECT * FROM advertisement", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log("advertisement: ", res);
        result(null, res);
    });
};

Advertisement.updateById = (id, advertisement, result) => {
    sql.query(
      "UPDATE advertisement SET email = ?, name = ?, active = ? WHERE id = ?",
      [advertisement.name, advertisement.description, advertisement.category, advertisement.lieu, advertisement.salary, advertisement.duration, advertisement.company, id],
      (err, res) => {
          if (err) {
              console.log("error: ", err);
              result(null, err);
              return;
          }

          if (res.affectedRows == 0) {
              // not found advertisement with the id
              result({ kind: "not_found" }, null);
              return;
          }

          console.log("updated advertisement: ", { id: id, ...advertisement });
          result(null, { id: id, ...advertisement });
      }
    );
};

Advertisement.remove = (id, result) => {
    sql.query("DELETE FROM advertisement WHERE id = ?", id, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        if (res.affectedRows == 0) {
            // not found advertisement with the id
            result({ kind: "not_found" }, null);
            return;
        }

        console.log("deleted advertisement with id: ", id);
        result(null, res);
    });
};

Advertisement.removeAll = result => {
    sql.query("DELETE FROM advertisement", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log(`deleted ${res.affectedRows} advertisement`);
        result(null, res);
    });
};

module.exports = Advertisement;
