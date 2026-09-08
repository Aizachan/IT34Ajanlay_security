CREATE TABLE IF NOT EXISTS activity_logs(
    activity_log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(255),
    user_email VARCHAR(255),
    activity_log_action VARCHAR(50) NOT NULL,
    activity_log_status ENUM('success', 'failed') DEFAULT 'SUCCESS',

    -- Client Parameters
    activity_log_ip_address VARCHAR(45),
    activity_log_user_agent VARCHAR(255),

    -- Timestamp
    activity_log_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- TABLE #3 users table
CREATE TABLE IF NOT EXISTS users(

    -- PIMARY KEY FOR USERS TABLE
    user_id INT AUTO_INCREMENT PRIMARY KEY,

    -- Initial User details
    user_email VARCHAR(255) UNIQUE NOT NULL,
    user_password VARCHAR(255) UNIQUE NOT NULL,
    user_role ENUM('admin', 'user') DEFAULT 'user',

    -- User Created Timestamp defualt not null
    user_created_at TIMESTAMP 
    DEFAULT CURRENT_TIMESTAMP
);

  -- Users updated timestamp
  user_updated_at TIMESTAMP
  DEFAULT CURRENT_TIMESTAMP 
  ON UPDATE CURRENT_TIMESTAMP
