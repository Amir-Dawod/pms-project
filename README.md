# 📊 Product Management System (PMS)

## 📝 Project Overview
Welcome to the **PMS Project**, a comprehensive web application built with **Pure PHP** and a **JSON-based File System**. This project demonstrates a full cycle of user interaction, from secure authentication to order management, with a dedicated administrative dashboard for system control.

---
**Live Demo:** [🚀 https://pms-projects.42web.io/](https://pms-projects.42web.io/)

## 🛠 Features & Functionalities

### 🔐 Authentication & Security
* **User Registration & Login:** A secure gateway for users to join the platform with encrypted credentials.
* **Data Validation & Sanitization:** High-level security measures to clean user inputs, preventing common vulnerabilities (like XSS) and ensuring data integrity.
* **Role-Based Access Control (RBAC):** Implementation of authorization levels (**Admin vs. User**) to protect sensitive routes and actions.

### 👤 User Experience (Customer Side)
* **Product Catalog:** Browse products seamlessly through a dynamic interface powered by JSON data.
* **Smart Shopping Cart:** Add products to a cart, manage quantities, and see real-time price updates.
* **Order Placement:** A streamlined checkout process that automatically links user profile data with cart items.
* **Order History:** A dedicated page for users to track their orders, sorted from **Newest to Oldest** for better tracking.

### ⚡ Administrative Suite (Admin Side)
* **Product Management:** Full **CRUD** (Create, Read, Update, Delete) capabilities for the product inventory.
* **User Management:** Ability to view all registered users and manage their accounts (Edit/Delete).
* **Staff Expansion:** Admins can register and authorize new administrators.
* **Global Order Overview:** A centralized dashboard to monitor all orders placed across the system.

---

## 🏗 Technical Stack

* **Backend:** PHP (Native)
* **Storage:** JSON File System (Structured Data Storage)
* **Frontend:** HTML5, CSS3, JavaScript (ES6)
* **UI Framework:** Bootstrap 5 (Responsive Design)

---

## 📁 Data Structure Logic
The system utilizes **JSON files** to simulate a database environment. This approach handles:
1. **Users Storage:** Storing encrypted credentials and user roles.
2. **Products Storage:** Managing item details, prices, and stock levels.
3. **Orders Storage:** Linking User IDs with Product Arrays to maintain a clean relational-like structure.

---

## 🚀 Installation & Setup
1. **Clone the repository:**
   ```bash
   git clone  [https://github.com/Amir-Dawod/pms-project.git](https://github.com/Amir-Dawod/pms-project.git)

### 👨‍💻 Developed by
**Amir Dawod** *Backend Developer | PHP Developer*
   
