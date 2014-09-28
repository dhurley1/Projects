import java.util.ArrayList;
import java.util.Scanner;
public class Doctor implements java.io.Serializable {

	
	private int doctorId;
	private String doctorName;
	private ArrayList<Patient> list= new ArrayList<Patient>();
	
	
	public Doctor()
	{
		
		
	}
	
	public Doctor(String doctorName,ArrayList list,int doctorId )
	{
		
	}
	
	public void setId()
	{
		this.doctorId=doctorId;
	}
	
	  
    public void setName(String doctorName)
    {
        this.doctorName=doctorName;
                 
    }
    
	public void addPatient()
	{
		Patient pat=new Patient(doctorId, doctorName, doctorName, doctorName, null);
		Scanner input= new Scanner(System.in);
		System.out.println("Enter name");
		/*String name = input.nextLine();
		*/
		
		pat.setName(input.nextLine());	
		
	}
	
	public void updatePatient ()
	{
		
		
	}
	
	public void findPatient ()
	{
		
		
	}
	
	public void patientReport()
	{
		
		
	}
	
	
}
