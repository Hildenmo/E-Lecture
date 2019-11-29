package server;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class LoginServlet extends HttpServlet {
	
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException{
		final String username = req.getParameter("username");
		final String password = req.getParameter("password");
		
		System.out.println("Username:" + username);
		System.out.println("Password" + password);
		
		if (username != null && password != null) {
			System.out.println("Username:" + username + "Password" + password);
			resp.setStatus(resp.SC_OK);
		} else {
			System.out.println("No username and Password");
			resp.sendError(HttpServletResponse.SC_UNAUTHORIZED, "User not authorized!" );
		}
	}
	
}
