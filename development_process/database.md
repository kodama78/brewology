#DATABASE
###This file covers the development process pertaining to any interaction with the database setup, structure, design or implementation.

#####Convert CSV file to MongoDB Collection
######by: Trevor Linan
######date: 09/27/2016
I have not converted a CSV file before so I started by researching the main concepts behind converting a CSV file to a NoSQL collection in mongoDB. We are using mongoDB on mLab.com
for our database storage. The most common recommendation while searching was to use mongoimport which is a built in import tool provided by mongoDB. In addition, 
mLab provided some very useful information in their Import/Export Helper. This helper included pre-filled standard commands for importing specific file types to the database. 
This of course made figuring out the proper commands very simple. However, there are many different commands you can give that will do different things, but I wanted to know what 
these standard commands did that were provided by mLab. There was only one part that I really needed to research.

**Command to convert CSV file**  
mongoimport -h <-database location provided by mLab-> -d <-database name-> -c <-collection name-> -u <-user-> -p <-password-> --file <-input .csv file-> --type csv --headerline

This command is very self explanatory. The majority of it is the database location and user authentication information. The unique part of this command though is the --headerline.
The --headerline tells mongoimport to use the very first line of each column of the CSV file as the field name. In order to convert the file, you must have either --headerline, 
--fields or --fieldsFile. These must specify what field names to use for each column of the CSV file. Without these, you will receive a validation error. I tried to run the command 
the first time without creating actual field header names and it proceeded to use the first line of the CSV file as the field names, which gave some odd and incorrect field names. 
I then created a new line at the top of the document and provided actual field names for each column. The result then turned out as expected.

**Overall Process:**  
1. Download and Install MongoDB.  
2. Create field header names for each column in the CSV file.  
3. Use standard conversion command provided by mLab and fill in the required values.  
4. Execute command  
5. Review new collection in mLab and check for errors.  
