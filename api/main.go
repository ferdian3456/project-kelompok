package main

import (
	"database/sql"
	"fmt"
	"strconv"
	"time"

	// "github.com/gorilla/websocket"
	"github.com/gin-gonic/gin"
	_ "github.com/go-sql-driver/mysql"
)

type UserData struct {
	ID          int       `json:"id"`
	Username    string    `json:"username"`
	Email       string    `json:"email"`
	Description string    `json:"description"`
	PhoneNumber string    `json:"phonenumber"`
	Password    string    `json:"password"`
	CreatedAt   int64     `json:"created_at"`
	Date        time.Time `json:"date"`
}

func main() {
	r := gin.Default()
	r.SetTrustedProxies([]string{"36.95.3.26"})

	db, err := sql.Open("mysql", "root:@tcp(127.0.0.1)/investkan-db?parseTime=true")
	if err != nil {
		fmt.Println(err)
		return
	}
	defer db.Close()

	r.GET("/getAllDataOwner", func(c *gin.Context) {
		userData, err := getAllDataOwner(db)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, userData)
	})

	r.GET("/getAllDataOwnerById/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		userData, err := getDataOwnerById(db, id)
		if err != nil {
			c.JSON(404, gin.H{"error": "User not found"})
			return
		}
		c.JSON(200, userData)
	})

	r.POST("/sendAllDataOwner", func(c *gin.Context) {
		var userData UserData
		err := c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		userData.CreatedAt = time.Now().UnixMilli()
		userData.Date = time.Unix(0, userData.CreatedAt*1e6)
		err = sendDataOwner(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(201, gin.H{"message": "Data inserted successfully"})
	})

	r.PUT("/updateDataOwner/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		var userData UserData
		userData.ID = id
		err = c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		err = updateDataOwner(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data updated successfully"})
	})

	r.DELETE("/deleteDataOwner/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		err = deleteDataOwner(db, id)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data deleted successfully"})
	})

	r.POST("/loginOwner", func(c *gin.Context) {
		var userData UserData
		err := c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		var user UserData
		err = db.QueryRow("SELECT * FROM owner WHERE Username=? AND Password=?", userData.Username, userData.Password).Scan(&user.ID, &user.Username, &user.Email, &user.Description, &user.PhoneNumber, &user.Password, &user.CreatedAt, &user.Date)
		if err != nil {
			c.JSON(401, gin.H{"error": "Invalid username or password"})
			return
		} else {
			c.JSON(200, gin.H{"message": "Logged in successfully"})
		}

	})

	r.GET("/getAllDataInvestor", func(c *gin.Context) {
		userData, err := getAllDataInvestor(db)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, userData)
	})

	r.GET("/getAllDataInvestorById/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		userData, err := getDataInvestorById(db, id)
		if err != nil {
			c.JSON(404, gin.H{"error": "User not found"})
			return
		}
		c.JSON(200, userData)
	})

	r.POST("/sendAllDataInvestor", func(c *gin.Context) {
		var userData UserData
		err := c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		userData.CreatedAt = time.Now().UnixMilli()
		userData.Date = time.Unix(0, userData.CreatedAt*1e6)
		err = sendDataInvestor(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(201, gin.H{"message": "Data inserted successfully"})
	})

	r.PUT("/updateDataInvestor/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		var userData UserData
		userData.ID = id
		err = c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		err = updateDataInvestor(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data updated successfully"})
	})

	r.DELETE("/deleteDataInvestor/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		err = deleteDataInvestor(db, id)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data deleted successfully"})
	})

	r.POST("/loginInvestor", func(c *gin.Context) {
		var userData UserData
		err := c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		var user UserData
		err = db.QueryRow("SELECT * FROM investor WHERE Username=? AND Password=?", userData.Username, userData.Password).Scan(&user.ID, &user.Username, &user.Email, &user.Description, &user.PhoneNumber, &user.Password, &user.CreatedAt, &user.Date)
		if err != nil {
			c.JSON(401, gin.H{"error": "Invalid username or password"})
			return
		} else {
			c.JSON(200, gin.H{"message": "Logged in successfully"})
		}

	})

	r.Run(":8080")
}

func getAllDataOwner(db *sql.DB) ([]UserData, error) {
	var userDataArray []UserData
	data, err := db.Query("SELECT Id, Username, Email, PhoneNumber, Description, Password, CreatedAt, Date FROM owner")
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.PhoneNumber, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Date)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func getDataOwnerById(db *sql.DB, id int) ([]UserData, error) {
	var userDataArray []UserData
	querySql := "SELECT * FROM users WHERE Id=?"
	data, err := db.Query(querySql, id)
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Date)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func sendDataOwner(db *sql.DB, user UserData) error {
	_, err := db.Exec("INSERT INTO owner (Username,Email,PhoneNumber, Description,Password,CreatedAt,Date) VALUES (?,?,?,?,?,?,?)", user.Username, user.Email, user.PhoneNumber, user.Description, user.Password, user.CreatedAt, user.Date)
	return err
}

func updateDataOwner(db *sql.DB, user UserData) error {
	_, err := db.Exec("UPDATE owner SET Username=?, Email=?, Description=?, Password=? WHERE Id=?", user.Username, user.Email, user.Description, user.Password, user.ID)
	return err
}

func deleteDataOwner(db *sql.DB, id int) error {
	_, err := db.Exec("DELETE FROM owner WHERE Id=?", id)
	return err
}

func getAllDataInvestor(db *sql.DB) ([]UserData, error) {
	var userDataArray []UserData
	data, err := db.Query("SELECT Id, Username, Email, PhoneNumber, Description, Password, CreatedAt, Date FROM investor")
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.PhoneNumber, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Date)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func getDataInvestorById(db *sql.DB, id int) ([]UserData, error) {
	var userDataArray []UserData
	querySql := "SELECT * FROM investor WHERE Id=?"
	data, err := db.Query(querySql, id)
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Date)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func sendDataInvestor(db *sql.DB, user UserData) error {
	_, err := db.Exec("INSERT INTO investor (Username,Email,PhoneNumber, Description,Password,CreatedAt,Date) VALUES (?,?,?,?,?,?,?)", user.Username, user.Email, user.PhoneNumber, user.Description, user.Password, user.CreatedAt, user.Date)
	return err
}

func updateDataInvestor(db *sql.DB, user UserData) error {
	_, err := db.Exec("UPDATE investor SET Username=?, Email=?, Description=?, Password=? WHERE Id=?", user.Username, user.Email, user.Description, user.Password, user.ID)
	return err
}

func deleteDataInvestor(db *sql.DB, id int) error {
	_, err := db.Exec("DELETE FROM investor WHERE Id=?", id)
	return err
}
