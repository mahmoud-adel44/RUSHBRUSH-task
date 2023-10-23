# RUSHBRUSH Task API [(API Documentation 🚀)](https://documenter.getpostman.com/view/29623223/2s9YRCXXSu)
RUSHBRUSH Task API for **_RUSHBRUSH_** Backend Engineer Assessment made with LARAVEL AND MYSQL.

## Running The API

Clone the project

```bash
git 'https://github.com/mahmoud-adel44/RUSHBRUSH-task.git'
cd 'cd RUSHBRUSH-task'
```


### Requests
#### ADMIN END POINTS
##### AUTH
```http
POST  /api/admin/login
```

Customers endpoints
```http
GET    /api/admin/customers
```

Products endpoints

```http
GET      /api/admin/products
POST     /api/admin/products
PUT      /api/admin/products/:product_id
DELETE   /api/admin/products/:product_id
```
#### USER END POINTS
##### AUTH
```http
POST  /api/admin/login
POST  /api/admin/register
```

Products endpoints

```http
GET  /api/admin/products
```

Orders endpoints

```http
GET  /api/user/orders
POST  /api/user/orders
PUT  /api/user/orders/:order_id
```

### Responses

The structure of response
```javascript
{
    "success": true,
    "message": "message",
    "data": {}
}
```
In case of error
```javascript
{
    "success": false,
    "message": "Order Not Found!",
    "error": {}
}
```
