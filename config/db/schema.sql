-- TABLE #2 activity_logs table
CREATE TABLE IF NOT EXISTS activity_logs (
    activity_log_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT,
    user_email VARCHAR(255),

    activity_log_action VARCHAR(50) NOT NULL,

    activity_log_status ENUM('success', 'failed') DEFAULT 'success',

    -- Client Parameters
    activity_log_ip_address VARCHAR(45),
    activity_log_user_agent VARCHAR(255),

    -- Timestamp
    activity_log_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- TABLE #3 users table
CREATE TABLE IF NOT EXISTS users (
    
    -- PRIMARY KEY FOR USERS TABLE
    user_id INT AUTO_INCREMENT PRIMARY KEY,

    -- Initial User Details

    user_email VARCHAR(255) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_role ENUM('admin', 'user') DEFAULT 'user',

    -- User Created Timestamp
    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- User Updated Timestamp
    user_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE users
ADD COLUMN user_username VARCHAR(100) UNIQUE NOT NULL
AFTER user_email;