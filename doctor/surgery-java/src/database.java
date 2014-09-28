import java.awt.Container;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.List;
import java.util.Properties;
import java.sql.*;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTabbedPane;
import javax.swing.JTextField;

public class Database  {
	// JDBC driver name and database URL
	   static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	   static final String DB_URL = "jdbc:mysql://localhost/surgery";
	   ResultSet rs;
	    Connection con ;
		   Statement stmt;
	   //  Database credentials
	   static final String USER = "root";
	   static final String PASS = null;
	   
	   public Database(){
		  
		   try{
		      //STEP 2: Register JDBC driver
		      Class.forName("com.mysql.jdbc.Driver");

		      //STEP 3: Open a connection
		      System.out.println("Connecting to a selected database...");
		      con = DriverManager.getConnection(DB_URL, USER, PASS);
		      System.out.println("Connected database successfully...");
		      
		      //STEP 4: Execute a query
		      System.out.println("Creating statement...");
		      stmt = con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_UPDATABLE);

		      String sql="select * from patient";
		       rs = stmt.executeQuery(sql);
		      //STEP 5: Extract data from result set
		      
		      
		      
		    
		   }catch(Exception e){
		      //Handle errors for Class.forName
		      e.printStackTrace();
		   }
		   System.out.println("Goodbye!");
		   
	   }
	   
	   public static void main(String[] args) {
		   login();
		   
		 /*
		   new Database();
		   new PatientGui();
		   new DoctorGui();*/
		}//end main
		//end JDBCExample


public static void maingui(){
	/*JLabel name= new JLabel();
	 
	final JFrame frame= new JFrame("Surgery System");
	
	frame.setSize(500,500);

	
	frame.setLayout(new GridLayout(2,2));
	frame.setVisible(true);

	JTabbedPane tabbedPane = new JTabbedPane();
	 JComponent panel1 = makeTextPanel("Panel #1");
        tabbedPane.addTab("Doctor",  panel1);
        tabbedPane.setMnemonicAt(0, KeyEvent.VK_1);
         
        panel1.setPreferredSize(new Dimension(410, 500));
        JComponent panel2 = makeTextPanel("Panel #2");
        tabbedPane.addTab("Patient",  panel2);
        tabbedPane.setMnemonicAt(1, KeyEvent.VK_2);
        
        add(tabbedPane);
      */   
	
	 JFrame frame = new JFrame("Doctor Surgery");
     frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
     frame.setPreferredSize(new Dimension(500, 600));
     frame.setResizable(false);
     frame.setLayout(new FlowLayout());
     Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
      frame.setLocation(dim.width/3-frame.getSize().width/3, dim.height/3-frame.getSize().height/3); //centers the frame

     
     //JPanel DoctorMain = new JPanel(new BorderLayout());
     //JPanel PaitientMain = new JPanel(new BorderLayout());
    
     
     Container contentPane = frame.getContentPane();
     contentPane.setLayout(new BoxLayout(contentPane, BoxLayout.Y_AXIS));

     new HistoryGui();
     new DoctorGui();
     
     new PatientGui();
     JTabbedPane tab = new JTabbedPane();
     
     
     tab.addTab("History",new HistoryGui());
     //tab.addTab("Doctor",new DoctorGui());
    
     
     frame.getContentPane().add(tab);   
     
     
         
     frame.add(tab);
     frame.pack();
     frame.setVisible(true);
	
}

 
     


public void listPatients()
{
	
}


public void updateDoctor ()
{
	
}
public void savePatientsFile ()
{
	
}
public void restorePatientsFromFile ()
{
	
}
public static void login ()
{	
	final JFrame frame= new JFrame();
	
   	JLabel name= new JLabel("name");
   	final JTextField loginName = new JTextField("name",15);
   	
   	JLabel password= new JLabel("Password");
   	final JPasswordField loginPassword = new JPasswordField("password",15);
   	
   	JButton btnLogin = new JButton("Login");
   	JButton cancel = new JButton("cancel");
   	cancel.addActionListener(new ActionListener(){public void actionPerformed(ActionEvent event){
   	  System.exit(0);
        }
        });
   	
	 JPanel panel = new JPanel();   	 
	 loginName.setBounds(70,30,150,20);
	loginPassword.setBounds(70,65,150,20);
                
	                     
	 panel.add(name);
	panel.add(loginName);
	panel.add(password);
	panel.add(loginPassword);
	panel.add(btnLogin);
	panel.add(cancel);
	            
	                 
frame.setSize(500,500);
frame.add(panel);

frame.setLayout(new GridLayout(2,2));
frame.setVisible(true);
 Dimension dim = Toolkit.getDefaultToolkit().getScreenSize();
 frame.setLocation(dim.width/3-frame.getSize().width/3, dim.height/3-frame.getSize().height/3); //centers the frame


String usrName =loginName.getText();


char[]paswd=loginPassword.getPassword();
String pasStr=new String(paswd);

if(usrName.equals("name") && pasStr.equals("password")) {

	frame.setVisible(true);

	 btnLogin.addActionListener(new ActionListener(){public void actionPerformed(ActionEvent event){
			frame.dispose();  
		 maingui();
	        
	        }
	        });

	
			
	} 
else {

	JOptionPane.showMessageDialog(null,"Wrong Password / Username");
	loginName.setText("");
	loginPassword.setText("");
	loginName.requestFocus();
	}


}}
