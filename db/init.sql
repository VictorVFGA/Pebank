CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  age INT,
  gender ENUM('male', 'female')
);

INSERT INTO users (name, age, gender) VALUES
  ('Pedro', 25, 'male'),
  ('Gaby', 30, 'female'),
  ('Benito', 40, 'male');