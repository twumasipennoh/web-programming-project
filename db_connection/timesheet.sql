create database timesheet;
create table timesheetTable

(
	Day VARCHAR(50) NOT NULL,
	Date date NOT NULL,
	TimeIn time,
	Lunch time,
	TimeBack time,
	TimeOut time,
	`Hours Worked` decimal(10,2)
   --  primary key(Day)
);

-- INSERT INTO timesheetTable VALUES
-- ('Sunday', '2021/04/11', '09:30:00', '09:50:00', '10:00:00', '17:00:00',15.4);

select * from timesheetTable;
-- ALTER table timesheetTable change Day Day varchar (50);

-- ALTER table timesheetTable Rename column HoursWorked to `Hours Worked`;
-- ALTER table timesheetTable Rename column TimeIn to `Time in`
-- ALTER table timesheetTable Rename column TimeBack to `Time Back`
-- ALTER table timesheetTable Rename column TimeOut to `Time Out`;
