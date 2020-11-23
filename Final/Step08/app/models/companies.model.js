const sql = require("./db.js");

// constructor
const Companies = function(companies) {
    
    this.name = companies.name;
    this.category = companies.category;
};

Companies.create = (newCompanies, result) => {
    sql.query("INSERT INTO companies SET ?", newCompanies, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        console.log("created companies: ", { id: res.insertId, ...newCompanies });
        result(null, { id: res.insertId, ...newCompanies });
    });
};

Companies.findById = (companiesId, result) => {
    sql.query(`SELECT * FROM companies WHERE id = ${companiesId}`, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(err, null);
            return;
        }

        if (res.length) {
            console.log("found companies: ", res[0]);
            result(null, res[0]);
            return;
        }

        // not found Companies with the id
        result({ kind: "not_found" }, null);
    });
};

Companies.getAll = result => {
    sql.query("SELECT * FROM companies", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log("companies: ", res);
        result(null, res);
    });
};

Companies.updateById = (id, companies, result) => {
    sql.query(
      "UPDATE companies SET email = ?, name = ?, active = ? WHERE id = ?",
      [companies.name, companies.category, id],
      (err, res) => {
          if (err) {
              console.log("error: ", err);
              result(null, err);
              return;
          }

          if (res.affectedRows == 0) {
              // not found companies with the id
              result({ kind: "not_found" }, null);
              return;
          }

          console.log("updated companies: ", { id: id, ...companies });
          result(null, { id: id, ...companies });
      }
    );
};

Companies.remove = (id, result) => {
    sql.query("DELETE FROM companies WHERE id = ?", id, (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        if (res.affectedRows == 0) {
            // not found companies with the id
            result({ kind: "not_found" }, null);
            return;
        }

        console.log("deleted companies with id: ", id);
        result(null, res);
    });
};

Companies.removeAll = result => {
    sql.query("DELETE FROM companies", (err, res) => {
        if (err) {
            console.log("error: ", err);
            result(null, err);
            return;
        }

        console.log(`deleted ${res.affectedRows} companies`);
        result(null, res);
    });
};

module.exports = Companies;
