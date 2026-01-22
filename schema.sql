create database if not exists lumina_db character set utf8mb4 collate utf8mb4_unicode_ci;
use lumina_db;

create table users (
    id int primary key auto_increment,
    username varchar(50) unique not null,
    email varchar(100) unique not null,
    password_hash varchar(255) not null,
    coins int default 0,
    level int default 1,
    created_at timestamp default current_timestamp,
    index idx_email (email),
    index idx_username (username)
) engine=innodb;

create table study_sessions (
    id int primary key auto_increment,
    user_id int not null,
    start_time datetime not null,
    end_time datetime,
    duration_minutes int,
    session_type enum('pomodoro', 'custom') default 'custom',
    coins_earned int default 0,
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id) on delete cascade,
    index idx_user_date (user_id, start_time)
) engine=innodb;

create table tasks (
    id int primary key auto_increment,
    user_id int not null,
    title varchar(255) not null,
    description text,
    priority enum('low', 'medium', 'high') default 'medium',
    status enum('pending', 'completed') default 'pending',
    estimated_time int,
    session_id int,
    created_at timestamp default current_timestamp,
    completed_at datetime,
    foreign key (user_id) references users(id) on delete cascade,
    foreign key (session_id) references study_sessions(id) on delete set null,
    index idx_user_status (user_id, status)
) engine=innodb;

create table rewards (
    id int primary key auto_increment,
    user_id int not null,
    reward_type enum('badge', 'theme', 'title') not null,
    reward_name varchar(100) not null,
    cost_coins int not null,
    unlocked boolean default false,
    unlocked_at datetime,
    foreign key (user_id) references users(id) on delete cascade,
    index idx_user_unlocked (user_id, unlocked)
) engine=innodb;

create table chat_history (
    id int primary key auto_increment,
    user_id int not null,
    message text not null,
    response text not null,
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id) on delete cascade,
    index idx_user_date (user_id, created_at)
) engine=innodb;

create view user_stats as
select 
    u.id,
    u.username,
    u.email,
    u.coins,
    u.level,
    count(distinct s.id) as total_sessions,
    coalesce(sum(s.duration_minutes), 0) as total_minutes,
    count(distinct case when t.status = 'completed' then t.id end) as completed_tasks,
    count(distinct case when date(s.start_time) = curdate() then s.id end) as today_sessions,
    coalesce(sum(case when date(s.start_time) = curdate() then s.duration_minutes else 0 end), 0) as today_minutes,
    coalesce(sum(case when yearweek(s.start_time) = yearweek(curdate()) then s.duration_minutes else 0 end), 0) as week_minutes
from users u
left join study_sessions s on u.id = s.user_id
left join tasks t on u.id = t.user_id
group by u.id, u.username, u.email, u.coins, u.level;