# 🔐 Secure PHP Authentication System

This project is a clean and secure user authentication system built in **pure PHP**. It includes best practices like session hardening, CSRF protection, rate limiting, and password hashing — all without external libraries.

---

## 🧰 Features

- Secure Login and Registration
- Session Hardening
- Session Regeneration
- CSRF Token Protection
- Password Hashing (`bcrypt`)
- Rate Limiting (Brute Force Protection)
- PDO + Prepared Statements (SQL Injection Safe)

---


## 🛠 Setup Instructions

### 1. Download or Clone


Or manually download and place the folder in `htdocs/` (if using XAMPP).

---

### 2. ⚙️ Create the MySQL Database

Run this SQL:
```sql
CREATE DATABASE secure_auth;

USE secure_auth;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
```
Run the application