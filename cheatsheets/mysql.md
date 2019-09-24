# MySQL

[Dummy data](https://github.com/justin-p/PowerShell/blob/master/random_sql_data.md)

[Sources](https://raw.githubusercontent.com/rstacruz/cheatsheets/master/mysql.md)

## Create / Delete Database

```sql
CREATE DATABASE dbNameYouWant
CREATE DATABASE dbNameYouWant CHARACTER SET utf8
DROP DATABASE dbNameYouWant
ALTER DATABASE dbNameYouWant CHARACTER SET utf8
```

## Backup Database to SQL File

```bash
mysqldump -u Username -p dbNameYouWant > databasename_backup.sql
```

## Restore from backup SQL File

```bash
mysql - u Username -p dbNameYouWant < databasename_backup.sql
```

## Repair Tables After Unclean Shutdown

```bash
mysqlcheck --all-databases
mysqlcheck --all-databases --fast
```

## Browsing

```sql
SHOW DATABASES
SHOW TABLES
SHOW FIELDS FROM table / DESCRIBE table
SHOW CREATE TABLE table
SHOW PROCESSLIST
KILL process_number
```

## Insert

```sql
INSERT INTO table1 (field1, field2, ...) VALUES (value1, value2, ...)
```

## Delete

```sql
DELETE FROM table1 / TRUNCATE table1
DELETE FROM table1 WHERE condition
DELETE FROM table1, table2 FROM table1, table2 WHERE table1.id1 =
  table2.id2 AND condition
```

## Update

UPDATE scores SET score=25 WHERE student_id=4 AND test_id=4;

## Select

```sql
SELECT * FROM absence;
+------------+------------+
| student_id | date       |
+------------+------------+
|          3 | 2013-09-01 |
|          5 | 2010-04-12 |
|         13 | 2019-04-08 |
|         14 | 2016-12-04 |
+------------+------------+
4 rows in set (0.00 sec)
```

```sql
SELECT * FROM table
SELECT * FROM table1, table2, ...
SELECT field1, field2, ... FROM table1, table2, ...
SELECT ... FROM ... WHERE condition
SELECT ... FROM ... WHERE condition GROUPBY field
SELECT ... FROM ... WHERE condition GROUPBY field HAVING condition2
SELECT ... FROM ... WHERE condition ORDER BY field1, field2
SELECT ... FROM ... WHERE condition ORDER BY field1, field2 DESC
SELECT ... FROM ... WHERE condition LIMIT 10
SELECT DISTINCT field1 FROM ...
SELECT DISTINCT field1, field2 FROM ...
```

## Rename

```sql
show tables;
+------------------+
| Tables_in_school |
+------------------+
| absence          |
| class            |
| score            |
| student          |
| test             |
+------------------+
5 rows in set (0.01 sec)

RENAME TABLE absence to absences, class to classes, score to scores, student to students, test to tests;
Query OK, 0 rows affected (0.02 sec)

show tables;
+------------------+
| Tables_in_school |
+------------------+
| absences         |
| classes          |
| scores           |
| students         |
| tests            |
+------------------+
5 rows in set (0.00 sec)
```

## Conditions

```sql
field1 = value1
field1 <> value1
field1 LIKE 'value _ %'
field1 IS NULL
field1 IS NOT NULL
field1 IS IN (value1, value2)
field1 IS NOT IN (value1, value2)
condition1 AND condition2
condition1 OR condition2
```

```sql
eq =
lt <
gt >
ge >=
le <=
ne !=
```

```sql
OR  ||  
AND &&
NOT !  
```

## Where

```sql
select first_name, last_name, state from students where sex="F";
+------------+-----------+-------+
| first_name | last_name | state |
+------------+-----------+-------+
| Siena      | Herring   | tv    |
| Paityn     | Montoya   | me    |
| Kaylin     | Moore     | yn    |
| Kayleigh   | Simon     | nh    |
| Laylah     | Hobbs     | kr    |
| Deja       | Hayes     | tx    |
| Kenya      | Park      | sg    |
| Araceli    | Gould     | ww    |
| Karley     | Roman     | mn    |
| Celeste    | Wilson    | ql    |
| Annabella  | Nixon     | os    |
| Yasmine    | Lawson    | ra    |
| Meadow     | Johnson   | fd    |
| Penelope   | Chase     | kb    |
| Aspen      | Velez     | va    |
+------------+-----------+-------+
15 rows in set (0.00 sec)
```

select where the year of birth_date is greater than 2000

```sql
SELECT first_name, last_name, birth_date FROM students WHERE YEAR(birth_date) >= 2000;
+------------+-----------+------------+
| first_name | last_name | birth_date |
+------------+-----------+------------+
| Tyler      | Morales   | 2004-08-27 |
| Deja       | Hayes     | 2003-12-10 |
| Celeste    | Wilson    | 2005-10-16 |
| Jaron      | Clements  | 2005-04-21 |
| Meadow     | Johnson   | 2005-07-12 |
| Aspen      | Velez     | 2004-06-07 |
| Kole       | Sanders   | 2000-08-24 |
+------------+-----------+------------+
7 rows in set (0.00 sec)
```

select where the month of birth_day is 3 OR where the state has the value of WA

```sql
SELECT first_name, last_name, birth_date,state FROM students WHERE MONTH(birth_date) = 3 OR state="WA";
+------------+-----------+------------+-------+
| first_name | last_name | birth_date | state |
+------------+-----------+------------+-------+
| Dale       | Cooper    | 1959-02-22 | WA    |
| Yasmine    | Lawson    | 1996-03-19 | ra    |
| Paxton     | Kerr      | 1991-03-18 | uc    |
| Aaden      | Valentine | 1997-03-05 | vb    |
+------------+-----------+------------+-------+
4 rows in set (0.00 sec)
```

```sql
SELECT first_name, last_name, birth_date,state FROM students WHERE day(birth_date) >= 12 AND (state="WA" OR state="ra");
SELECT first_name, last_name, birth_date,state FROM students WHERE day(birth_date) >= 12 && (state="WA" || state="ra");
+------------+-----------+------------+-------+
| first_name | last_name | birth_date | state |
+------------+-----------+------------+-------+
| Dale       | Cooper    | 1959-02-22 | WA    |
| Yasmine    | Lawson    | 1996-03-19 | ra    |
+------------+-----------+------------+-------+
2 rows in set, 2 warnings (0.00 sec)
```

## Not null

select all last_name from students where a value is been supplied. Do not show null data.

```sql
SELECT last_name FROM students WHERE last_name IS NOT NULL;
+-----------+
| last_name |
+-----------+
| Cooper    |
| Herring   |
| Montoya   |
| Moore     |
| Morales   |
| Simon     |
| Hobbs     |
| Hayes     |
| Park      |
| Gould     |
| Roman     |
| Mitchell  |
| Wilson    |
| Savage    |
| Nixon     |
| Lawson    |
| Clements  |
| Johnson   |
| Cortez    |
| Kerr      |
| Valentine |
| Riley     |
| Chase     |
| Velez     |
| Sanders   |
+-----------+
25 rows in set (0.01 sec)
```

## Order by

order the select by last_name

```sql
select first_name, last_name FROM students ORDER BY last_name;
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Penelope   | Chase     |
| Jaron      | Clements  |
| Dale       | Cooper    |
| Killian    | Cortez    |
| Araceli    | Gould     |
| Deja       | Hayes     |
| Siena      | Herring   |
| Laylah     | Hobbs     |
| Meadow     | Johnson   |
| Paxton     | Kerr      |
| Yasmine    | Lawson    |
| Marcos     | Mitchell  |
| Paityn     | Montoya   |
| Kaylin     | Moore     |
| Tyler      | Morales   |
| Annabella  | Nixon     |
| Kenya      | Park      |
| Greyson    | Riley     |
| Karley     | Roman     |
| Kole       | Sanders   |
| Arnav      | Savage    |
| Kayleigh   | Simon     |
| Aaden      | Valentine |
| Aspen      | Velez     |
| Celeste    | Wilson    |
+------------+-----------+
25 rows in set (0.00 sec)
```

## Order desc

order the select by last_name but in descending order.

```sql
select first_name, last_name FROM students ORDER BY last_name DESC;
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Celeste    | Wilson    |
| Aspen      | Velez     |
| Aaden      | Valentine |
| Kayleigh   | Simon     |
| Arnav      | Savage    |
| Kole       | Sanders   |
| Karley     | Roman     |
| Greyson    | Riley     |
| Kenya      | Park      |
| Annabella  | Nixon     |
| Tyler      | Morales   |
| Kaylin     | Moore     |
| Paityn     | Montoya   |
| Marcos     | Mitchell  |
| Yasmine    | Lawson    |
| Paxton     | Kerr      |
| Meadow     | Johnson   |
| Laylah     | Hobbs     |
| Siena      | Herring   |
| Deja       | Hayes     |
| Araceli    | Gould     |
| Killian    | Cortez    |
| Dale       | Cooper    |
| Jaron      | Clements  |
| Penelope   | Chase     |
+------------+-----------+
25 rows in set (0.00 sec)
```

## ORDER BY (multi)

order by multiple values.

```sql
SELECT first_name, last_name, state FROM students ORDER BY state DESC, last_name ASC;
+------------+-----------+-------+
| first_name | last_name | state |
+------------+-----------+-------+
| Kaylin     | Moore     | yn    |
| Kole       | Sanders   | yi    |
| Marcos     | Mitchell  | xj    |
| Araceli    | Gould     | ww    |
| Dale       | Cooper    | WA    |
| Aaden      | Valentine | vb    |
| Aspen      | Velez     | va    |
| Paxton     | Kerr      | uc    |
| Deja       | Hayes     | tx    |
| Siena      | Herring   | tv    |
| Jaron      | Clements  | te    |
| Kenya      | Park      | sg    |
| Tyler      | Morales   | ry    |
| Yasmine    | Lawson    | ra    |
| Celeste    | Wilson    | ql    |
| Annabella  | Nixon     | os    |
| Kayleigh   | Simon     | nh    |
| Arnav      | Savage    | nc    |
| Karley     | Roman     | mn    |
| Paityn     | Montoya   | me    |
| Laylah     | Hobbs     | kr    |
| Penelope   | Chase     | kb    |
| Meadow     | Johnson   | fd    |
| Killian    | Cortez    | eb    |
| Greyson    | Riley     | df    |
+------------+-----------+-------+
25 rows in set (0.00 sec)
```

## Limit

Limit the select to 5 values.

```sql
select student_id,first_name, last_name FROM students LIMIT 5;
+------------+------------+-----------+
| student_id | first_name | last_name |
+------------+------------+-----------+
|          1 | Dale       | Cooper    |
|          2 | Siena      | Herring   |
|          3 | Paityn     | Montoya   |
|          4 | Kaylin     | Moore     |
|          5 | Tyler      | Morales   |
+------------+------------+-----------+
5 rows in set (0.00 sec)
```

limit the select to the next 5 values after 5.

```sql
select student_id,first_name, last_name FROM students LIMIT 5, 5;
+------------+------------+-----------+
| student_id | first_name | last_name |
+------------+------------+-----------+
|          6 | Kayleigh   | Simon     |
|          7 | Laylah     | Hobbs     |
|          8 | Deja       | Hayes     |
|          9 | Kenya      | Park      |
|         10 | Araceli    | Gould     |
+------------+------------+-----------+
5 rows in set (0.00 sec)
```

limit the select to the next 1 value after 5.

```sql
select student_id,first_name, last_name FROM students LIMIT 5, 1;
+------------+------------+-----------+
| student_id | first_name | last_name |
+------------+------------+-----------+
|          6 | Kayleigh   | Simon     |
+------------+------------+-----------+
1 row in set (0.00 sec)
```

## Concat and As

CONCAT can be used to 'merge' 2 things into something custom
AS can be used to rename something.

```sql
SELECT CONCAT(first_name, " ", last_name) AS 'Name',Sex AS 'Gender' FROM students LIMIT 1;
+-------------+--------+
| Name        | Gender |
+-------------+--------+
| Dale Cooper | M      |
+-------------+--------+
1 row in set (0.00 sec)

SELECT CONCAT(first_name, " ", last_name) AS 'Name',Sex AS 'Gender' FROM students LIMIT 1;
+-------------+--------+
| Name        | Gender |
+-------------+--------+
| Dale Cooper | M      |
+-------------+--------+
1 row in set (0.00 sec)


SELECT CONCAT(first_name, " ", last_name) AS 'Name',Sex AS 'Gender',"Ow Hi there" FROM students LIMIT 1;
+-------------+--------+-------------+
| Name        | Gender | Ow Hi there |
+-------------+--------+-------------+
| Dale Cooper | M      | Ow Hi there |
+-------------+--------+-------------+

SELECT CONCAT(first_name, " ", last_name) AS 'Name',Sex AS 'Gender',"Ow Hi there" AS Comment FROM students LIMIT 1;
+-------------+--------+-------------+
| Name        | Gender | Comment     |
+-------------+--------+-------------+
| Dale Cooper | M      | Ow Hi there |
+-------------+--------+-------------+
1 row in set (0.00 sec)

```

## Like

```sql
% = wildcard
_ = something needs to be here.
```

```sql
SELECT last_name, first_name FROM students WHERE first_name LIKE 'D%' or last_name LIKE '%n';
+-----------+------------+
| last_name | first_name |
+-----------+------------+
| Cooper    | Dale       |
| Simon     | Kayleigh   |
| Hayes     | Deja       |
| Roman     | Karley     |
| Wilson    | Celeste    |
| Nixon     | Annabella  |
| Lawson    | Yasmine    |
| Johnson   | Meadow     |
+-----------+------------+
8 rows in set (0.00 sec)
```

all students that have name first_name of 4 unknown letters and a known 5th letter with value of N

```sql
SELECT last_name, first_name FROM students WHERE first_name LIKE '____n';
+-----------+------------+
| last_name | first_name |
+-----------+------------+
| Clements  | Jaron      |
| Valentine | Aaden      |
| Velez     | Aspen      |
+-----------+------------+
3 rows in set (0.00 sec)

```

all students that have name first_name of 4 or more letters, 4th must have a value of e

```sql
SELECT last_name, first_name FROM students WHERE first_name LIKE '___e%';
+-----------+------------+
SELECT last_name, first_name FROM students WHERE first_name LIKE '___e%';
+-----------+------------+
| last_name | first_name |
+-----------+------------+
| Cooper    | Dale       |
| Morales   | Tyler      |
| Wilson    | Celeste    |
| Valentine | Aaden      |
| Chase     | Penelope   |
| Velez     | Aspen      |
| Sanders   | Kole       |
+-----------+------------+
7 rows in set (0.00 sec)
```

## Distinct 

only show unique values 

```sql
SELECT DISTINCT type FROM tests ORDER BY type;
+------+
| type |
+------+
| T    |
| Q    |
+------+
2 rows in set (0.01 sec)
```

## COUNT

Count unique

```sql
SELECT COUNT(DISTINCT type) FROM tests;
+----------------------+
| COUNT(DISTINCT type) |
+----------------------+
|                    2 |
+----------------------+
1 row in set (0.00 sec)


SELECT COUNT(*) as StudentCount FROM students;
+--------------+
| StudentCount |
+--------------+
|           25 |
+--------------+

SELECT COUNT(*) as MaleStudentCount FROM students WHERE sex='M';
+------------------+
| MaleStudentCount |
+------------------+
|               10 |
+------------------+
1 row in set (0.00 sec)


SELECT sex, COUNT(*) AS GenderCount FROM students GROUP BY sex;
+-----+-------------+
| sex | GenderCount |
+-----+-------------+
| M   |          10 |
| F   |          15 |
+-----+-------------+
2 rows in set (0.00 sec)
```

## Group by

count the students that are born on the same month, then GROUP and ORDER by month.

```sql
select Month(birth_date) AS 'Month', Count(*) AS Students FROM students GROUP BY Month ORDER BY Month;
+-------+----------+
| Month | Students |
+-------+----------+
|     1 |        1 |
|     2 |        1 |
|     3 |        3 |
|     4 |        1 |
|     6 |        4 |
|     7 |        3 |
|     8 |        4 |
|    10 |        3 |
|    11 |        2 |
|    12 |        3 |
+-------+----------+
10 rows in set (0.01 sec)

select Month(birth_date) AS 'Month', Count(student_id) AS Students FROM students GROUP BY Month ORDER BY Month;
+-------+----------+
| Month | Students |
+-------+----------+
|     1 |        1 |
|     2 |        1 |
|     3 |        3 |
|     4 |        1 |
|     6 |        4 |
|     7 |        3 |
|     8 |        4 |
|    10 |        3 |
|    11 |        2 |
|    12 |        3 |
+-------+----------+
10 rows in set (0.00 sec)

```

## Having

> Difference between the having and where clause in sql is that the where clause can not be used with aggregates, but the having clause can. One way to think of it is that the having clause is an additional filter to the where clause.

[source](https://stackoverflow.com/questions/16155937/mysql-having-vs-where)

> To summarize the difference between WHERE and HAVING:
> WHERE is used to filter records before any groupings take place.
> HAVING is used to filter values after they have  been groups.  Only columns or expression in the group can be included in the HAVING clause’s conditions..

[source](https://www.essentialsql.com/what-is-the-difference-between-where-and-having-clauses/)

```sql
SELECT sex, COUNT(sex) AS 'Amount' FROM students GROUP BY sex HAVING Amount > 10;
+-----+--------+
| sex | Amount |
+-----+--------+
| F   |     15 |
+-----+--------+
1 row in set (0.00 sec)
```

## MATH stuff

```sql
SELECT test_id AS 'Test',
MIN(score) AS min,
MAX(score) as max,
MAX(score)-MIN(SCORE) AS 'range',
SUM(score) AS total,
AVG(score) AS average
FROM scores GROUP BY test_id;

+------+------+------+-------+-------+---------+
| Test | min  | max  | range | total | average |
+------+------+------+-------+-------+---------+
|    1 |    1 |   15 |    14 |   166 |  6.6400 |
|    2 |    1 |   13 |    12 |   149 |  5.9600 |
|    3 |    1 |   15 |    14 |   183 |  7.3200 |
|    4 |    1 |   15 |    14 |   206 |  8.2400 |
|    5 |    2 |   15 |    13 |   215 |  8.6000 |
|    6 |    1 |   15 |    14 |   220 |  8.8000 |
|    7 |    1 |   15 |    14 |   204 |  8.1600 |
|    8 |    1 |   15 |    14 |   193 |  7.7200 |
|    9 |    1 |   15 |    14 |   208 |  8.3200 |
|   10 |    2 |   15 |    13 |   210 |  8.4000 |
+------+------+------+-------+-------+---------+
10 rows in set (0.00 sec)
```

## Between

```sql
SELECT first_name, last_name, birth_date FROM students WHERE birth_date BETWEEN '1997-1-1' AND '1995-1-1';
Empty set (0.00 sec)

SELECT first_name, last_name, birth_date FROM students WHERE birth_date BETWEEN '1995-1-1' AND '1997-1-1';
+------------+-----------+------------+
| first_name | last_name | birth_date |
+------------+-----------+------------+
| Kenya      | Park      | 1996-07-11 |
| Araceli    | Gould     | 1996-10-02 |
| Karley     | Roman     | 1996-12-24 |
| Annabella  | Nixon     | 1995-12-27 |
| Yasmine    | Lawson    | 1996-03-19 |
| Killian    | Cortez    | 1995-07-02 |
+------------+-----------+------------+
6 rows in set (0.00 sec)
```

## In

match for 'array' (list) of vales. Can also be used on sub query's.

```sql
SELECT first_name, last_name FROM students WHERE last_name IN ('Cooper','Sanders','Johnson');
+------------+-----------+
| first_name | last_name |
+------------+-----------+
| Dale       | Cooper    |
| Meadow     | Johnson   |
| Kole       | Sanders   |
+------------+-----------+
3 rows in set (0.00 sec)
```

## Join

```sql
SELECT ... FROM t1 JOIN t2 ON t1.id1 = t2.id2 WHERE condition
SELECT ... FROM t1 LEFT JOIN t2 ON t1.id1 = t2.id2 WHERE condition
SELECT ... FROM t1 JOIN (t2 JOIN t3 ON ...) ON ...
```

```sql
SELECT student_id, date, score, maxscore FROM tests, scores WHERE date='2009-08-29' AND tests.test_id = scores.test_id;
+------------+------------+-------+----------+
| student_id | date       | score | maxscore |
+------------+------------+-------+----------+
|          1 | 2009-08-29 |     3 |       15 |
|          2 | 2009-08-29 |     1 |       15 |
|          3 | 2009-08-29 |     6 |       15 |
|          4 | 2009-08-29 |     2 |       15 |
|          5 | 2009-08-29 |    13 |       15 |
|          6 | 2009-08-29 |     8 |       15 |
|          7 | 2009-08-29 |     9 |       15 |
|          8 | 2009-08-29 |     8 |       15 |
|          9 | 2009-08-29 |    11 |       15 |
|         10 | 2009-08-29 |     8 |       15 |
|         11 | 2009-08-29 |     6 |       15 |
|         12 | 2009-08-29 |     1 |       15 |
|         13 | 2009-08-29 |     8 |       15 |
|         14 | 2009-08-29 |    10 |       15 |
|         15 | 2009-08-29 |     7 |       15 |
|         16 | 2009-08-29 |     1 |       15 |
|         17 | 2009-08-29 |     4 |       15 |
|         18 | 2009-08-29 |     1 |       15 |
|         19 | 2009-08-29 |     1 |       15 |
|         20 | 2009-08-29 |     8 |       15 |
|         21 | 2009-08-29 |    10 |       15 |
|         22 | 2009-08-29 |     7 |       15 |
|         23 | 2009-08-29 |     7 |       15 |
|         24 | 2009-08-29 |    15 |       15 |
|         25 | 2009-08-29 |    11 |       15 |
+------------+------------+-------+----------+
25 rows in set (0.00 sec)


SELECT scores.student_id, tests.date, scores.score FROM tests, scores WHERE date='2009-08-29' AND tests.test_id = scores.test_id;

+------------+------------+-------+
| student_id | date       | score |
+------------+------------+-------+
|          1 | 2009-08-29 |     3 |
|          2 | 2009-08-29 |     1 |
|          3 | 2009-08-29 |     6 |
|          4 | 2009-08-29 |     2 |
|          5 | 2009-08-29 |    13 |
|          6 | 2009-08-29 |     8 |
|          7 | 2009-08-29 |     9 |
|          8 | 2009-08-29 |     8 |
|          9 | 2009-08-29 |    11 |
|         10 | 2009-08-29 |     8 |
|         11 | 2009-08-29 |     6 |
|         12 | 2009-08-29 |     1 |
|         13 | 2009-08-29 |     8 |
|         14 | 2009-08-29 |    10 |
|         15 | 2009-08-29 |     7 |
|         16 | 2009-08-29 |     1 |
|         17 | 2009-08-29 |     4 |
|         18 | 2009-08-29 |     1 |
|         19 | 2009-08-29 |     1 |
|         20 | 2009-08-29 |     8 |
|         21 | 2009-08-29 |    10 |
|         22 | 2009-08-29 |     7 |
|         23 | 2009-08-29 |     7 |
|         24 | 2009-08-29 |    15 |
|         25 | 2009-08-29 |    11 |
+------------+------------+-------+
25 rows in set (0.00 sec)

SELECT CONCAT(students.first_name, " ", students.last_name) As Name,
tests.date, scores.score, tests.maxscore
FROM tests, scores, students
WHERE date='2009-08-29'
AND tests.test_id = scores.test_id
AND scores.student_id = students.student_id;

SELECT students.student_id,
CONCAT(students.first_name, " ", students.last_name) As Name,
COUNT(absences.date) As Absences
tests.date, scores.score, tests.maxscore
FROM students, Absences
WHERE students.student_id = absences.student_id
GROUP BY students.student_id;
```

## Left join

```sql
SELECT students.student_id,
CONCAT(students.first_name, " ", students.last_name) As Name,
COUNT(absences.date) As Absences,
FROM  students LEFT JOIN absences
ON students.student_id = absences.student_id
GROUP BY students.student_id;
```

## INNER JOIN

```SQL
SELECT students.first_name,
students.last_name,
scores.test_id,
scores.score
FROM students
INNER JOIN scores
ON students.student_id = scores.student_id
WHERE scores.score <= 15
ORDER BY scores.test_id;
```

## Create / Delete / Modify Table

### Create

```sql
CREATE TABLE table (field1 type1, field2 type2, ...)
CREATE TABLE table (field1 type1, field2 type2, ..., INDEX (field))
CREATE TABLE table (field1 type1, field2 type2, ..., PRIMARY KEY (field1))
CREATE TABLE table (field1 type1, field2 type2, ..., PRIMARY KEY (field1,
field2))
```

```sql
CREATE TABLE table1 (fk_field1 type1, field2 type2, ...,
  FOREIGN KEY (fk_field1) REFERENCES table2 (t2_fieldA))
    [ON UPDATE|ON DELETE] [CASCADE|SET NULL]
```

```sql
CREATE TABLE table1 (fk_field1 type1, fk_field2 type2, ...,
 FOREIGN KEY (fk_field1, fk_field2) REFERENCES table2 (t2_fieldA, t2_fieldB))
```

```sql
CREATE TABLE table IF NOT EXISTS (...)
```

```sql
CREATE TEMPORARY TABLE table (...)
```

### Drop

```sql
DROP TABLE table
DROP TABLE IF EXISTS table
DROP TABLE table1, table2, ...
```

### Alter

```sql
ALTER TABLE table MODIFY field1 type1
ALTER TABLE table MODIFY field1 type1 NOT NULL ...
ALTER TABLE table CHANGE old_name_field1 new_name_field1 type1
ALTER TABLE table CHANGE old_name_field1 new_name_field1 type1 NOT NULL ...
ALTER TABLE table ALTER field1 SET DEFAULT ...
ALTER TABLE table ALTER field1 DROP DEFAULT
ALTER TABLE table ADD new_name_field1 type1
ALTER TABLE table ADD new_name_field1 type1 FIRST
ALTER TABLE table ADD new_name_field1 type1 AFTER another_field
ALTER TABLE table DROP field1
ALTER TABLE table ADD INDEX (field);
```

### Change field order

```sql
ALTER TABLE table MODIFY field1 type1 FIRST
ALTER TABLE table MODIFY field1 type1 AFTER another_field
ALTER TABLE table CHANGE old_name_field1 new_name_field1 type1 FIRST
ALTER TABLE table CHANGE old_name_field1 new_name_field1 type1 AFTER
  another_field
```

## Keys

```sql
CREATE TABLE table (..., PRIMARY KEY (field1, field2))
CREATE TABLE table (..., FOREIGN KEY (field1, field2) REFERENCES table2
(t2_field1, t2_field2))
```

## Users and Privileges

```sql
GRANT ALL PRIVILEGES ON base.* TO 'user'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, DELETE ON base.* TO 'user'@'localhost' IDENTIFIED BY 'password';
REVOKE ALL PRIVILEGES ON base.* FROM 'user'@'host'; -- one permission only
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'user'@'host'; -- all permissions
```

```sql
SET PASSWORD = PASSWORD('new_pass')
SET PASSWORD FOR 'user'@'host' = PASSWORD('new_pass')
SET PASSWORD = OLD_PASSWORD('new_pass')
```

```sql
DROP USER 'user'@'host'
```

Host ‘%’ indicates any host.

## Main Data Types

```sql
TINYINT (1o: -217+128)
SMALLINT (2o: +-65 000)
MEDIUMINT (3o: +-16 000 000)
INT (4o: +- 2 000 000 000)
BIGINT (8o: +-9.10^18)
```

```sql
Precise interval: -(2^(8*N-1)) -> (2^8*N)-1
```

⚠ INT(2) = "2 digits displayed" -- NOT "number with 2 digits max"

```sql
FLOAT(M,D)
DOUBLE(M,D)
FLOAT(D=0->53)
```

⚠ 8,3 -> 12345,678 -- NOT 12345678,123!

```sql
TIME (HH:MM)
YEAR (AAAA)
DATE (AAAA-MM-JJ)
DATETIME (AAAA-MM-JJ HH:MM; années 1000->9999)
TIMESTAMP (like DATETIME, but 1970->2038, compatible with Unix)
```

```sql
VARCHAR (single-line; explicit size)
TEXT (multi-lines; max size=65535)
BLOB (binary; max size=65535)
```

Variants for TEXT&BLOB: `TINY` (max=255), `MEDIUM` (max=~16000), and `LONG` (max=4Go). Ex: `VARCHAR(32)`, `TINYTEXT`, `LONGBLOB`, `MEDIUMTEXT`

```sql
ENUM ('value1', 'value2', ...) -- (default NULL, or '' if NOT NULL)
```

## Reset Root Password

```bash
/etc/init.d/mysql stop
```

```bash
mysqld_safe --skip-grant-tables
```

```bash
$ mysql # on another terminal
mysql> UPDATE mysql.user SET password=PASSWORD('new_pass') WHERE user='root';
```

```bash
## Switch back to the mysqld_safe terminal and kill the process using Control + \
$ /etc/init.d/mysql start
```
