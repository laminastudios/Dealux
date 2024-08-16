
# Dealux

The Online Shopping Comparison Platform is a web application designed to revolutionize the online shopping experience. By aggregating product listings from multiple e-commerce sites like Shopee, Lazada, Zalora, Alibaba, Shein, and eBay, it enables users to easily search, compare, and purchase products—all from one unified platform.


## Features

- Unified Search Functionality
    - Users enter the name of the product they are looking for, and the app searches across several integrated e-commerce platforms to deliver a consolidated list of relevant results.

- Advanced Filtering Options
    - The application enables users to refine search results using filters such as highest rating and lowest price, among others, to tailor the results to their preferences.

- Direct Purchase Option
    - If users find a product available on a particular platform, such as Shopee, they can opt to place the order directly through the web app. This feature streamlines the buying process by allowing users to complete their purchase without navigating away from the app.

## Branching Strategy
This repository follows a structured branching strategy to manage development and releases:

- 'master': Contains the production-ready code.
- 'dev': Active development branch where features are integrated.

## Installation

### Prerequisites
- Node.js
- Vue.js 
- Laravel
- Composer 
- API Keys from supported e-commerce platforms 

### Setup
1. Clone the Repository:
```bash
   git clone https://github.com/jewelldmnt/Dealux.git
   cd Dealux
```

2. Install Dependencies:
```bash
   npm install
   composer install
```
3. Prepare the Environment Variables:
- Rename the provided env file to .env:
```bash
   mv env .env
```

4. Run Database Migration:
```bash
   php artisan migrate:rollback --step=1
   php artisan migrate
```

5. Run the Project
```bash
   npm run dev
   php artisan serve 
```
