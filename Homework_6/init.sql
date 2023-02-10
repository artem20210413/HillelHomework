CREATE TABLE users (
    id         int AUTO_INCREMENT
        PRIMARY KEY,
    name       varchar(300) NULL,
    email      varchar(300) NULL,
    created_at timestamp    NULL,
    updated_at timestamp    NULL,
    password   varchar(300) NULL
);





CREATE TABLE orders (
    id         int AUTO_INCREMENT
        PRIMARY KEY,
    name       varchar(300) NULL,
    price      int NULL,
    user_id      int NULL,
    created_at timestamp    NULL,
    updated_at timestamp    NULL
);

CREATE TABLE products (
    id         int AUTO_INCREMENT
        PRIMARY KEY,
    name       varchar(300) NULL,
    price      int NULL,
    created_at timestamp    NULL,
    updated_at timestamp    NULL
);

CREATE TABLE order_product (
    id         int AUTO_INCREMENT
        PRIMARY KEY,
    order_id       int NOT NULL,
    product_id       int NOT NULL,
    created_at timestamp    NULL,
    updated_at timestamp    NULL
);
