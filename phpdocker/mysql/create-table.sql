create table voxus.localizations
(
    user_id int unsigned auto_increment
        primary key,
    latitude varchar(255) not null,
    longitude varchar(255) not null,
    created_at timestamp null,
    updated_at timestamp null
)
    collate=utf8mb4_unicode_ci;

