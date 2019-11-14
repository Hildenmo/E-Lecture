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
		
		if (validUser(username, password)) {
			resp.setStatus(HttpServletResponse.SC_OK, "User authorized!");
		} else {
			resp.sendError(HttpServletResponse.SC_UNAUTHORIZED, "User not authorized!" );
		}
	}

	private boolean validUser(String username, String password) {
		// TODO Auto-generated method stub
		return false;
	}
}
