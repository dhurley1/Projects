import javax.swing.*;

import java.util.ArrayList;
import java.util.Scanner;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.applet.Applet;
import java.sql.*;
public class Surgery extends JPanel
{
	private JPanel contentPane;
	public static void main(String[] args) {
		// TODO Auto-generated method stub

	int surgeryId;
	String surgeryAdd;
		
	ArrayList<Doctor> SurList=new ArrayList<Doctor>();
		
	Scanner input =new Scanner(System.in);
	
		
	                    
        login();
    
       /* orderButton = new JButton("Place order");
        orderButton.addActionListener(new ActionListener(){public void actionPerformed(ActionEvent event){
        processOrder();
        }
        });
		*/
	}
	
	
	
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

         
         JTabbedPane tab = new JTabbedPane();
         
         /*"Patient",new PatientGui());
         tab.addTab("History",new HistoryGui());
         tab.addTab("Doctor",new DoctorGui());
        */
         
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
	
