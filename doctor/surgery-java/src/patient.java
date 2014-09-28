
import java.util.ArrayList;
import java.util.Date;
import java.util.Scanner;

import javax.swing.JPanel;

public class Patient  implements java.io.Serializable {
	private static int count=1;
	private int patientId;
	private String patientName;
	private String patientAddress;
	private String patientPhone;	
	private Date patientDOB;	
      ArrayList<PatientHistory> History=new ArrayList<PatientHistory>() ;
	
	
    
	
     public Patient( int patientId,String patientName, String patientAddress,String phone, Date patientDOB )
     {
    	 this.patientId=count;
    	 count++;
    	  patientName=patientName;
    	  patientAddress=patientAddress;
    	  phone=phone;
    	  patientDOB=patientDOB;
     }
     
  

public void doctorsVisit()
     {
    	 
     }
   
   public void setId(int patientId){
	   
	  this.patientId=patientId;
   }
   
 public void setName(String patientName){
	   this.patientName=patientName;
   }
 
 public void setAddress(String patientAddress){
	   this.patientAddress=patientAddress;
 }
 
 public void setPhone(String patientPhone){
	   this.patientPhone=patientPhone;
 }
 
 public void setDOB(Date patientDOB){
	   this.patientDOB=patientDOB;
 }
 
 public int getId()
 {
	 
     return patientId;
 }
 
 public String getName()
 {
     return patientName;
 }
 
 public String getAddress()
 {
     return patientAddress;
 }
 
 public String getPhone()
 {
     return patientPhone;
 }
 public Date getDOB()
 {
	 return patientDOB;
 }
 
 
 public void visit()
 {
	 PatientHistory thisVisit=new PatientHistory(patientId, 1, "general checkup", "new antibiotic", "removed arm");
	 History.add(thisVisit);
 }
 public String toString()
 {
     return getId() + "           " + getName() + "\t" + getPhone()+ "\t" + getAddress() + "\t" +"\n Doctor visit: " + getDOB()+ "\n" +"\n";
 }
 
	  public void print()
 {
     System.out.println(toString());
 }

	
   
     }


