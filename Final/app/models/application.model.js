const sql = require("./db.js");

// constructor
const Application = function(application) {
    
    this.mails = application.mails;
    this.people = application.people;
    this.ad = application.ad;
};

Application.create = (newApplication, result) => {
    sql.query("INSERT INTO application SET ?", newApplication, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        console.log("created application: ", { id: res.insertId, ...newApplication });
        result(null, { id: res.insertId, ...newApplication });
    });
};

Application.findById = (applicationId, result) => {
    sql.query(`SELECT * FROM application WHERE id = ${applicationId}`, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        if (res.length) {
            console.log("found application: ", res[0]);
            result(null, res[0]);
            return;
        }

        // not found Application with the id
        result({ kind: "not_found" }, null);
    });
};

Application.getAll = result => {
    sql.query("SELECT * FROM application", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log("application: ", res);
        result(null, res);
    });
};

Application.updateById = (id, application, result) => {
    sql.query(
      "UPDATE application SET email = ?, name = ?, active = ? WHERE id = ?",
      [application.mails, application.people, application.ad, id],
      (err, res) => {
          if (err) {
              console.log("error: ", err);
              result(null, err);
              return;
          }

          if (res.affectedRows == 0) {
              // not found application with the id
              result({ kind: "not_found" }, null);
              return;
          }

          console.log("updated application: ", { id: id, ...application });
          result(null, { id: id, ...application });
      }
    );
};

Application.remove = (id, result) => {
    sql.query("DELETE FROM application WHERE id = ?", id, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        if (res.affectedRows == 0) {
            // not found application with the id
            result({ kind: "not_found" }, null);
            return;
        }

        console.log("deleted application with id: ", id);
        result(null, res);
    });
};

Application.removeAll = result => {
    sql.query("DELETE FROM application", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log(`deleted ${res.affectedRows} application`);
        result(null, res);
    });
};

module.exports = Application;
